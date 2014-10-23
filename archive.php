<html>

<head>
<title>Archive - Critique</title>
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
<a class="barlink" href="archive.php">Archive</a>
<a class="barlink" href="about.php">About</a>
</div>
<hr style="width:20em;height: 0px; border: 1px solid #888; margin-bottom: 10px" />

<?php

if(mysqli_connect_errno()) {
  echo "Could not connect to MySQL server<br />";
}

$sqlq="SELECT * FROM post ORDER BY id DESC LIMIT 10";
$res=mysqli_query($con,$sqlq);

if($res) {
while($row = mysqli_fetch_array($res)) {

// THE BIG SHABANGER

echo "<div class=\"arttitle\"><a href=\"post.php?id={$row['id']}\">" . $row['title'];
echo "</a></div><div class=\"artauthor\">{$row['author']}, {$row['postdate']}</div>";

}
} else {
  echo "Could not get post from MySQL database<br />";
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
