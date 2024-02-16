<?php

namespace MediaWiki\Extension\DismissableSiteNotice;

use Html;
use Skin;

class Hooks {

	/**
	 * @param string &$notice
	 * @param Skin $skin
	 * @suppress SecurityCheck-DoubleEscaped
	 */
	public static function onSiteNoticeAfter( &$notice, $skin ) {
		global $wgMajorSiteNoticeID, $wgDismissableSiteNoticeForAnons, $wgSitename; // Añadimos $wgSitename

		if ( method_exists( $skin, 'getVersion' ) ) {
			// does the skin support versioning and if so does it provide dismissable site notices?
			if ( $skin->getVersion() === 2 ) {
				return;
			}
		}

		if ( !$notice ) {
			return;
		}

		// Dismissal for anons is configurable
		if ( $wgDismissableSiteNoticeForAnons || $skin->getUser()->isRegistered() ) {
			// Cookie value consists of two parts
			$major = (int)$wgMajorSiteNoticeID;
			$minor = (int)$skin->msg( 'sitenotice_id' )->inContentLanguage()->text();

			$out = $skin->getOutput();
			$out->addModuleStyles( 'ext.sitenotice2.styles' );
			$out->addModules( 'ext.sitenotice2' );
			$out->addJsConfigVars( 'wgSiteNoticeId', "$major.$minor" );

			// Modificamos la estructura HTML para incluir el nombre del wiki y el botón de cerrar
			$wikiName = htmlspecialchars( $wgSitename ); // Obtenemos el nombre del wiki
			$notice = Html::rawElement( 'div', [ 'class' => 'mw-sitenotice2' ],
				Html::rawElement( 'div', [ 'class' => 'mw-sitenotice2-header' ], // Nuevo elemento para el encabezado
					Html::element( 'h2', [], $wikiName ) . // Agregamos el nombre del wiki
					Html::rawElement( 'span', [ 'class' => 'mw-sitenotice2-close' ],
						$skin->msg( 'sitenotice_close-brackets' )
							->rawParams(
								Html::element(
									'a',
									[ 'tabindex' => '0', 'role' => 'button' ],
									$skin->msg( 'sitenotice_close' )->text()
								)
							)
							->escaped()
					)
				) .
				Html::rawElement( 'div', [ 'class' => 'mw-sitenotice2-body' ], $notice )
			);
		}

		if ( $skin->getUser()->isAnon() ) {
			// Hide the sitenotice from search engines (see bug T11209 comment 4)
			// NOTE: Is this actually effective?
			// NOTE: Avoid document.write (T125323)
			// NOTE: Must be compatible with JavaScript in ancient Grade C browsers.
			$jsWrapped =
				'<div id="mw-dismissablenotice-anonplace"></div>' .
				Html::inlineScript(
					'(function(){' .
					'var node=document.getElementById("mw-dismissablenotice-anonplace");' .
					'if(node){' .
					// Replace placeholder with parsed HTML from $notice.
					// Setting outerHTML is supported in all Grade C browsers
					// and gracefully fallsback to just setting a property.
					// It is short for:
					// - Create temporary element or document fragment
					// - Set innerHTML.
					// - Replace node with wrapper's child nodes.
					'node.outerHTML=' . Xml::encodeJsVar( $notice ) . ';' .
					'}' .
					'}());'
				);
			$notice = $jsWrapped;
		}
	}
}
