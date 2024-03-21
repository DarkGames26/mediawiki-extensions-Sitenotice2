<div align="center">
<h3>
Sitenotice2 - MediaWiki
</h3>
<p>An extension that improves the appearance of Sitenotice.</p>
</div>

<div align="left">
This extension was built based on the DismissableSiteNotice extension, but with different changes to the HTML and CSS structure to improve its appearance.
</div>

## 🚀 Installation
1. [Download](https://github.com/DarkGames26/mediawiki-extensions-Sitenotice2/archive/refs/heads/main.zip) place the file(s) in a directory called `Sitenotice2` in your `extensions/` folder.
2. Add the following code at the bottom of your LocalSettings.php:
```php
wfLoadExtension( 'Sitenotice2' );
```
3. **✔️Done** - Navigate to Special:Version on your wiki to verify that the extension is successfully installed.

### 👀 Notes
⚠️ This extension should not be used with DismissableSiteNotice. It was created based on that extension, so it has all the functionality that DismissableSiteNotice already had.

## 🧞 Configurations
**Available configurations**

| ⚙️ | Name | Description | Values | Default
:--- | :--- | :--- | :--- | :---
| ⚙️ | `$wgDismissableSiteNoticeForAnons` | This allows to set whether or not it should be possible for anonymous visitors of the wiki to dismiss the sitenotice shown. Available for MW 1.25 + | `true` or `false` | `true`
| ⚙️ | `$wgMajorSiteNoticeID` | Integer. The value is stored inside a cookie. When a user decides to close the sitenotice, the current value of `$wgMajorSiteNoticeID` is saved as well and the closed notice is not shown again. `$wgMajorSiteNoticeID` now can be incremented when a new text is set up as sitenotice. If `$wgMajorSiteNoticeID` has inbetween been incremented, then the sitenotice is shown again, even if the user closed an older sitenotice before. | `true` or `false` | `0`

## 🕹️ Usage
When you add a new sitenotice and want everyone to see it, change the number on the created page "MediaWiki:Sitenotice id" by one (e.g. if it would be 5, you'd replace the page with the number 6 and so on).

The extension behavior is that it will remember the dismissal by the user and only reset after the number in MediaWiki:Sitenotice_id has been raised. This allows a wiki to make minor updates to a notice without causing it to show again for everybody.

## Configurando Colores
Sitenotice2 fue pensada para ser altamente modificable fácilmente con CSS, por lo que la extensión tiene diferentes variables que se usan para los colores que se muestran en el aviso, lo cuál permite que puedas modificar fácilmente su aspecto.

### Variables CSS
| ⚙️ | Name | Description
:--- | :--- | :---
| ⚙️ | `--filter-glass` | Filtro aplicado a todo el aviso.
| ⚙️ | `--sitenotice2-border-radius` | border-radius aplicado en diferentes partes del aviso, tanto en el conteneidor principal, como en el borde izquierdo.
| ⚙️ | `--sitenotice2-border` | Color del borde
| ⚙️ | `--sitenotice2-background`  | Fondo del aviso.
| ⚙️ | `--sitenotice2-background--header` | Fondo para el encabezado. En caso que no quieras fondo, solo establecelo en `transparent`.
| ⚙️ | `--sitenotice2-background--secondary`  | Fondo para el borde izquierdo del aviso.


### Ejemplo de configuración:
```
/*  🎨 Extension:Sitenotice2 
    -------------------------  */
:root {
	--sitenotice2-border-radius: 6px;
	--sitenotice2-border: #a51919;

	--sitenotice2-background: rgba(232,189,189,0.73);
	--sitenotice2-background--header: rgba(251,225,225,0.6);
	--sitenotice2-background--secondary: #a51919;
}
```
