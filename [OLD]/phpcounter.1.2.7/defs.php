<?
//////////////////////////////////////////////////////////////////////
//
// PHPcounter - a web counter tracking system in PHP
//
// Copyright (C) 2004-2005 - Tsvetozar Drambozov <tsvetozar@netbg.com>
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// 10 Dec 2004 - Initial version.
//
//////////////////////////////////////////////////////////////////////

// Change the following lines
$dbhost = "localhost";
$dbuser = "lsa";
$dbpass = "me7aes4ahH";
$dbname = "lsa";
$counter_url = "http://mhlp.mcgill.ca/page.php"; // change to the full URL where your PHPcounter is located
$lang = "en";

// additional options and configurations
$color_table_border = "#DDCCBB";
$color_table_header = "#FFEEDD";
$color_table_contents = "#FFFFFF";
$width_table = 500;
$font_color_header = "black";
$font_name = "Tahoma";
$font_size = 2;
$bgcolor1 = "white";
$bgcolor2 = "#FFF8F0";

@include("langs/en.php");
@include("langs/$lang.php");
@include("langs/$_GET[l].php");
?>