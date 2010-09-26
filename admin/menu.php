Welcome <?php echo $user; ?>, What would you like to do today?


<fieldset>
	<legend>Quick Links</legend>
			<a href="index.php?page=Home">Home</a>  |  
			<a href="index.php?page=Forum">Forum</a>  |  
			<a href="index.php?page=Logout">Logout</a>
</fieldset>

<fieldset>
	<legend>News Management</legend>
		<ul>
			<li><a href="index.php?page=Admin&action=addpost">Add a News Post</a></li>
			<li><a href="index.php?page=Admin&action=editpost">Edit a News Post</a></li>
			<li><a href="index.php?page=Admin&action=deletepost">Delete a News Post</a></li>
		</ul>
</fieldset>

<fieldset>
	<legend>Game Management</legend>
		<ul>
			<li><a href="index.php?page=Admin&action=addgame">Add a Game Item</a></li>
			<li><a href="index.php?page=Admin&action=editgame">Edit a Game Item</a></li>
			<li><a href="index.php?page=Admin&action=deletegame">Delete a Game Item</a></li>
			<li><a href="index.php?page=Admin&action=gameupload">Game Upload</a></li>
		</ul>
</fieldset>

<fieldset>
	<legend>Media Management</legend>
		<ul>
			<li><a href="index.php?page=Admin&action=addmedia">Add a Media Item</a></li>
			<li><a href="index.php?page=Admin&action=editmedia">Edit a Media Item</a></li>
			<li><a href="index.php?page=Admin&action=deletemedia">Delete a Media Item</a></li>
			<br />
			<li><a href="index.php?page=Admin&action=addmediacategory">Add a Media Category</a></li>
			<li><a href="index.php?page=Admin&action=editmediacategory">Edit a Media Category</a></li>
			<li><a href="index.php?page=Admin&action=deletemediacategory">Delete a Media Category</a></li>
			<br />
			<li><a href="index.php?page=Admin&action=mediaupload">Media Upload</a></li>
		</ul>
</fieldset>

<fieldset>
	<legend>Portfolio Management</legend>
		<ul>
			<li><a href="index.php?page=Admin&action=addportfolio">Add a Portfolio Item</a></li>
			<li><a href="index.php?page=Admin&action=editportfolio">Edit a Portfolio Item</a></li>
			<li><a href="index.php?page=Admin&action=deleteportfolio">Delete a Portfolio Item</a></li>
			<br />
			<li><a href="index.php?page=Admin&action=addportfoliocategory">Add a Portfolio Category</a></li>
			<li><a href="index.php?page=Admin&action=editportfoliocategory">Edit a Portfolio Category</a></li>
			<li><a href="index.php?page=Admin&action=deleteportfoliocategory">Delete a Portfolio Category</a></li>
			<br />
			<li><a href="index.php?page=Admin&action=portfolioupload">Portfolio Upload</a></li>
		</ul>
</fieldset>

<fieldset>
	<legend>Partner Management</legend>
		<ul>
			<li><a href="index.php?page=Admin&action=addpartner">Add a Partner</a></li>
			<li><a href="index.php?page=Admin&action=editpartner">Edit a Partner</a></li>
			<li><a href="index.php?page=Admin&action=deletepartner">Delete a Partner</a></li>
			<li><a href="index.php?page=Admin&action=partnerupload">Partner Image Upload</a></li>
		</ul>
</fieldset>

<fieldset>
	<legend>Admin Management</legend>
		<ul>
			<li><a href="index.php?page=Admin&action=addadmin">Add an Admin</a></li>
			<li><a href="index.php?page=Admin&action=deleteadmin">Delete an Admin</a></li>
		</ul>
</fieldset>

<fieldset>
	<legend>Misc. Management</legend>
		<ul>
			<li><a href="index.php?page=Admin&action=editwelcome">Edit the Welcome Page</a></li>
			<li><a href="index.php?page=Admin&action=viewcontacts">View all Contact Requests</a></li>
			<li><a href="index.php?page=Admin&action=upload">Upload a File</a></li>
		</ul>
</fieldset>