<html>

<head>
<title>Submit Content - Critique</title>
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
mysqli_close($con);
?>
<a class="barlink" href="archive.php">Archive</a>
<a class="barlink" href="about.php">About</a>
</div>
<hr style="width:20em;height: 0px; border: 1px solid #888; margin-bottom: 10px" />

<form action="preview.php" method="post" style="width:30em; margin-left:auto; margin-right:auto;">
Title: <input type="text" name="title" maxlength="100" /><br />
Author: <input type="text" name="author" maxlegth="50" /><br />
Body: <textarea name="body" rows="10" cols="50"></textarea><br />
<input type="submit" />
</form>

<p>Supported markup:</p>

<p>&lt;i&gt;text&lt;/i&gt; produces <i>text</i>.<p>

<p>&lt;b&gt;text&lt;/b&gt; produces <b>text</b>.</p>

<p>&lt;section&gt; produces a section break.</p>
<p>&lt;link &quot;http://google.com&quot;&gt;text&lt;/link&gt; produces <a href="http://google.com">text</a>.</p>

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
