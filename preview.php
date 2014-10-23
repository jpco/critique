<html> 
<head>
<title>This common man business is so tiresome - Critique</title>
<link rel="stylesheet" type="text/css" href="mainstyle.css">
</head>

<body>
<div class="content">
<div class="pagetitle">
<a href=".">critique</a>
</div>
<hr style="width:30em;border: 1px solid #888" />
<div class="linkbar">
<?php
$con=mysqli_connect("localhost","critique","","posts");

$sqlq="SELECT id FROM post ORDER BY id DESC LIMIT 1";
$res=mysqli_query($con,$sqlq);
if($res) {
while($row = mysqli_fetch_array($res)){
  echo "<a class=\"barlink\" href=\"post.php?id={$row['id']}\">Newest</a>";
} }
?>
<a class="barlink" href=".">Archive</a>
<a class="barlink" href="about.php">About</a>
</div>
<hr style="width:20em;height: 0px; border: 1px solid #888; margin-bottom: 10px" />

<?php

if(mysqli_connect_errno()) {
  echo "Could not connect to MySQL server<br />";
}

// THE BIG SHABANGER

$title = $_POST['title'];
$author = $_POST['author'];
$date = date("Y-m-d");

echo "<div class=\"arttitle\">" . $title . " &ndash; Preview";
echo "</a></div><div class=\"artauthor\">{$author}, " . $date . "</div>";

if(!isset($_POST['subbutt'])) {
	$body = htmlspecialchars($_POST["body"], ENT_QUOTES | ENT_SUBSTITUTE, "");

	// italicization
	$body = preg_replace("~&lt;i&gt;(.*)&lt;/i&gt;~s","<i>$1</i>",$body);

	// bolding
	$body = preg_replace("~&lt;b&gt;(.*)&lt;/b&gt;~s","<b>$1</b>",$body);

	// links
	$body = preg_replace("~&lt;link &quot;(.*)&quot;&gt;(.*)&lt;/link&gt;~s","<a href=\"$1\">$2</a>",$body);

	// first character
	$body = preg_replace("/^(.)/x","<span class=\"firstchar\">$1</span>",$body);

	// sections
	$body = preg_replace("~(\r?\n)+&lt;section&gt;(\r?\n)+(.)~s","</p><div class=\"linkbar\"><a>*</a><a>*</a><a>*</a></div><p><span class=\"firstchar\">$3</span>",$body);

	// paragraphs
	$body = "<p>" . $body . "</p>";
	$body = preg_replace("/(\r?\n){2,}/s","</p><p>",$body);

	echo $body;

	echo '<form method="POST">';
	echo "<input type=\"hidden\" name=\"title\" value=\"" . $title . "\">";
	echo "<input type=\"hidden\" name=\"author\" value=\"" . $author . "\">";
	echo "<input type=\"hidden\" name=\"body\" value='" . $body . "'>";
	echo '<input type="submit" name="subbutt" />';
	echo '</form>';
} else {
	$filename = "posts/" . date("Y-m-d") . "-";
	$filename .= preg_replace("/[^a-zA-Z1-9]/","-",strtolower($_POST[title]));

	if(file_put_contents($filename, $_POST['body']."\n")) {
		if(mysqli_query($con, "INSERT INTO post (title, author, postdate, bodylink) VALUES ('" . $_POST[title] . "', '" . $_POST[author] . "', '" . date("Y-m-d") . "', '" . $filename . "');")) {
			echo "<p>Post made.</p>";
			echo "<p><a href=\".\">Go home?</a></p>";

			mysqli_close($con);
		} else {
			echo "<p>Something went wrong.</p>";
		}
	}
}

mysqli_close($con);

?>

<!-- footer -->

<p>&nbsp;</p>

<hr style="width:30em;border: 1px solid #888" />
<hr style="width:20em;height: 0px; border: 1px solid #888" />

<div class="linkbar">
<a>Website &copy; Jack Conger 2014</a>
</div>

<p>&nbsp;</p>

</div>
</body>

<!-- oppoooooopooopPOOOP -->

</html>
