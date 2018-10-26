<?php

function print_header_safe($page_title) 
{
print "<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">\n";
print "<!--";
print "Design by Free CSS Templates";
print "http://www.freecsstemplates.org";
print "Released for free under a Creative Commons Attribution 2.5 License";
print "";
print "Name       : Joyousness ";
print "Description: A two-column, fixed-width design with dark color scheme.";
print "Version    : 1.0";
print "Released   : 20130919";
print "";
print "-->";
print "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
print "<head>";
print "<meta http-equiv=\"Content-Type\" content=\"text\/html; charset=utf-8\" \/>";
print "<title>$page_title</title>";
print "<link href=\"default.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" \/>";
print "<!--[if IE 6]>";
print "<link href=\"default_ie6.css\" rel=\"stylesheet\" type=\"text/css\" \/>";
print "<![endif]-->";
print "</head>";
print "<body>";
print "<div id=\"header-wrapper\">";
print "<div id=\"header\" class=\"container\">";
print "		<div id=\"headertitle\">";
print "			<h1>Prompt Generators</h1>";
print "		</div>";
print "		<div id=\"menu\">";
print "			<ul>";
print "			<li><a href=\"index_safe.html\" accesskey=\"1\" title=\"\">Homepage</a></li>";
print "				<li><a href=\"index_safe.html#contact\" accesskey=\"5\" title=\"\">Contact</a></li>";
print "			</ul>";
print "		</div>";
print "	</div>";
print "</div>";
}

function print_header($type, $page_title) 
{
	if ($type == "safe") {
	   print_header_safe($page_title);
	} else {
	   print_header_main($page_title);
	}
}

function print_header_main($page_title) 
{
print "<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">\n";
print "<!--";
print "Design by Free CSS Templates";
print "http://www.freecsstemplates.org";
print "Released for free under a Creative Commons Attribution 2.5 License";
print "";
print "Name       : Joyousness ";
print "Description: A two-column, fixed-width design with dark color scheme.";
print "Version    : 1.0";
print "Released   : 20130919";
print "";
print "-->";
print "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
print "<head>";
print "<meta http-equiv=\"Content-Type\" content=\"text\/html; charset=utf-8\" \/>";
print "<title>$page_title</title>";
print "<link href=\"default.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" \/>";
print "<!--[if IE 6]>";
print "<link href=\"default_ie6.css\" rel=\"stylesheet\" type=\"text/css\" \/>";
print "<![endif]-->";
print "</head>";
print "<body>";
print "<div id=\"header-wrapper\">";
print "<div id=\"header\" class=\"container\">";
print "		<div id=\"headertitle\">";
print "			<h1>Prompt Generators</h1>";
print "		</div>";
print "		<div id=\"menu\">";
print "			<ul>";
print "			<li><a href=\"index.html\" accesskey=\"1\" title=\"\">Homepage</a></li>";
print "				<li><a href=\"crowdfunding.html\" accesskey=\"3\" title=\"\">Get a Custom<br>Prompt Generator</a></li>";
print "				<li><a href=\"crowdfunding.html#support\" accesskey=\"4\" title=\"\">Support<br>this Site</a></li>";
print "				<li><a href=\"index.html#contact\" accesskey=\"5\" title=\"\">Contact</a></li>";
print "			</ul>";
print "		</div>";
print "	</div>";
print "</div>";
}

function print_footer($type) 
{
print "<div id=\"footer\" class=\"container\">";
print "	  <h2><a name=contact>Get in touch</h2>";
print "	  <span class=\"byline\">I can be contacted on either DreamWidth or LiveJournal via the PM system</span>";
print "	  <ul class=\"contact\">";
print "		<li><a href=\"http://annariel.dreamwidth.org\">DreamWidth</a></li>";
print "		<li><a href=\"http://lsellersfic.livejournal.com\">LiveJournal</a></li>";
print "	   </ul>";
print "	<p>&copy; 2014 dennis-sellers.com. | Photos by <a href=\"http://fotogrph.com/\">Fotogrph</a> | ";
print "Design by <a href=\"http://www.freecsstemplates.org/\" rel=\"nofollow\">FreeCSSTemplates.org</a>.</p>";
print "</div>";
print "</body>";
print "</html>";
}
?>