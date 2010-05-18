{*
 * $Revision: 15342 $
 * If you want to customize this file, do not edit it directly since future upgrades
 * may overwrite it.  Instead, copy it into a new directory called "local" and edit that
 * version.  Gallery will look for that file first and use it if it exists.
 *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="{g->language}">
  <head>
    {* Let Gallery print out anything it wants to put into the <head> element *}
    {g->head}

    {* If Gallery doesn't provide a header, we use the album/photo title (or filename) *}
    {if empty($head.title)}
      <title>{$theme.item.title|markup:strip|default:$theme.item.pathComponent}</title>
    {/if}

    {* Include this theme's style sheet *}
    <link rel="stylesheet" type="text/css" href="{g->theme url="theme.css"}"/>

    <style type="text/css">
	.content {ldelim} width: {$theme.params.contentWidth}px; {rdelim}
	{if !empty($theme.params.thumbnailSize)}
	  {assign var="thumbCellSize" value=$theme.params.thumbnailSize+30}
	  .gallery-thumb {ldelim} width: {$thumbCellSize}px; height: {$thumbCellSize}px; {rdelim}
	  .gallery-album {ldelim} height: {$thumbCellSize+30}px; {rdelim}
	{/if}
    </style>
	<link title="Waverley Model Railway Club Gallery" rel="search" type="application/opensearchdescription+xml"  href="http://www.waverleymrc.org.au/gallery2/provider.xml">
  </head>
  <body class="gallery">
    <div {g->mainDivAttributes}>
      {*
       * Some module views (eg slideshow) want the full screen.  So for those, we don't draw
       * a header, footer, navbar, etc.  Those views are responsible for drawing everything.
       *}
      {if $theme.useFullScreen}
	{include file="gallery:`$theme.moduleTemplate`" l10Domain=$theme.moduleL10Domain}
      {elseif $theme.pageType == 'progressbar'}
	<div class="header"></div>
	<div class="content">
	  {g->theme include="progressbar.tpl"}
	</div>
      {else}
      <div class="header"></div>
      <div class="content">
	<div class="breadcrumb">
	  {g->block type="core.BreadCrumb" skipRoot=true separator="/"}
	</div>
	<img src="{g->theme url="img/wmrcLogo.png"}" alt="Waverley Model Railway Club">
	<img src="{g->theme url="img/wmrcText.png"}" alt="Waverley Model Railway Club"><br />&nbsp;
					<div id="menu">
						<div>
							<img src="{g->theme url="img/menuEnd.png"}" class="floatRight">
							<ul>
								<li class="menuMain">MENU</li>
								<li><a href="/">Home</a></li>
								<li><a href="/gallery2/">Gallery</a></li>
								<li><a href="/about-the-club/">About the club</a></li>
								<li><a href="/contact-us/">Contact us</a></li>
								<li><a href="/exhibitions/">Exhibitions</a></li>
							</ul>
						</div>
					</div>
	{* Include the appropriate content type for the page we want to draw. *}
	{if $theme.pageType == 'album'}
	  {g->theme include="album.tpl"}
	{elseif $theme.pageType == 'photo'}
	  {g->theme include="photo.tpl"}
	{elseif $theme.pageType == 'admin'}
	  {g->theme include="admin.tpl"}
	{elseif $theme.pageType == 'module'}
	  {g->theme include="module.tpl"}
	{/if}
	<div id="search">
		<script type="text/javascript" src="{g->url href='modules/search/SearchBlock.js'}"></script>
		{g->block type=search.SearchBlock}
		<p><a href="#" onclick="window.external.AddSearchProvider('http://www.waverleymrc.org.au/gallery2/provider.xml')">Add Search Provider</a></p>
	</div>
	<div class="footer">
		<table width="100%" cellspacing="0" cellpadding="0">
        	        <tr>
                	        <td width="13"><img src="{g->theme url="img/footerLeft.png"}"></td>
                        	<td class="footer" valign="bottom" align="right">
					<div>
          {g->logoButton type="validation"}
          {g->logoButton type="gallery2"}
          {g->logoButton type="gallery2-version"}
          {g->logoButton type="donate"}
					</div>
	                        </td>
        	                <td width="13"><img src="{g->theme url="img/footerRight.png"}"></td>
	               	</tr>
	        </table>
        	&nbsp;
	</div>
      </div>

      {/if}  {* end of full screen check *}
    </div>

    {*
     * Give Gallery a chance to output any cleanup code, like javascript that needs to be run
     * at the end of the <body> tag.  If you take this out, some code won't work properly.
     *}
    {g->trailer}

    {* Put any debugging output here, if debugging is enabled *}
    {g->debug}
  </body>
</html>
