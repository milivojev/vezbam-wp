<?php
// Template Name: Query practice template


echo '<h1>This is an example of a very basic WP_Query Loop.</h1>';
	$query = new WP_Query([
		'post_type' => 'post'
	]);
	while($query->have_posts()) {
		$query->the_post();
		echo the_title();
		echo '<br>';
	}
echo '<h1>Now let\'s look at what get_posts does.<br>Note that i have added a posts_per_page parameter. It simply limits the number of the posts returned.</h1>';
	$posts = get_posts([
		'post_type' => 'post',
		'posts_per_page' => 1
	]);
	echo "<pre>";
	foreach ($posts as $post) {
		var_dump($post);
		echo "</pre>";
	}
echo '<h1>Let\'s try a more advanced example of a Query:<br>I am looking for all "posts" from the category "front-end", that are tagged "css". I want them to be ordered by "modified date" and presented in ascending order. *your category and tag names may differ</h1>';
	$query = new WP_Query([
		'post_type' => 'post',
		// 'category_name' => 'websites',
		'tag' => 'photoshop',
		'orderby' => 'modified',
		'order' => 'ASC',
	]);
	while($query->have_posts()) {
		$query->the_post();
		echo the_title();
		echo '<br>';
	}
echo "<h1>Task #1: Write a query that outputs titles of only 2 posts that have last been modified.</h1>";
$query = new WP_Query([
	'post_type'=>'post',
	'orderby'=>'modified',
	'posts_per_page'=>2
]);
while($query->have_posts()):
	$query->the_post();
	echo the_title().". modified date:".get_the_modified_date('F j, Y g:i a')."<br>";
endwhile;

echo "<h1>Task #2: Write a query that outputs titles of all pages!</h1>";

$query = new WP_Query([
	'post_type'=>'page'
]);

while($query->have_posts()):
	$query->the_post();
	echo the_title()."<br>";
endwhile;	
echo "<h1>Task #3: Write a query that outputs creation dates of all posts. The posts must be sorted by created date, in an descending order.</h1>";
$query = new WP_Query([
	'post_type'=>'post',
	'orderby'=>'date',
	'order'=>'DESC'
]);
while($query->have_posts()):
	$query->the_post();
	echo get_the_title(). " created: ".get_the_date('F j, Y g:i a')."<br>";
endwhile;	

echo "<h1>Task #4: Write a query that shows all the posts for two tags of your choice at the same time. Output each post title and it's tag list.</h1>";
$query = new WP_Query([
	'post_type'=>'post',
	'tag_slug__in'=>['photoshop','ux','javascript']
]);
while($query->have_posts()):
	$query->the_post();
	echo get_the_title()." and its tags are: ".get_the_tag_list( $before = '', $sep = ',', $after = '.', $id = 0 )."<br>";

endwhile;

echo "<h1>Task #5: Write the same query, but limit post number to 3.</h1>";
$query = new WP_Query([
		'post_type'=>'post',
	'tag_slug__in'=>['photoshop','ux','javascript'],
	'posts_per_page'=>3
]);

while($query->have_posts()):
	$query->the_post();
	echo get_the_title()."  and its tags are: ".get_the_tag_list( $before = '', $sep = '', $after = '', $id = 0 )."<br>";
endwhile;	
echo "<h1>Task #6: Write a query that finds the page by name Practice, and output it's author ID.</h1>";
$query = new WP_Query([
	'post_type'=>'page',
	'pagename'=>'about-me'
]);
while($query->have_posts()):
	$query->the_post();
	echo get_the_title()." .Author is: ". get_the_author()."<br>";
endwhile;	
echo "<h1>Task #7: Copy the same query, but use the author ID in combination with the get_user_by() method. It will get you the user object, so that you can output Author's full name and email.</h1>";
$query = new WP_Query([
	'post_type'=>'page',
	'pagename'=>'about-me'
]);

$author_id = get_the_author_meta('ID');
		$user_details = get_user_by('ID',$author_id);
		// echo "<pre>";
		// var_dump($user_details);
		// echo "</pre>";
		echo "users name is: ".$user_details->display_name . " and email is: ". $user_email;
echo "<h1>Task #8: Write a query that outputs all posts from a certain category of your choice. Set the output limit to unlimited number of posts (-1) , and order them by title in an alphabetical order.</h1>";
$query = new WP_Query([
			'post_type' => 'post',
			'category_name' => 'applications',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC'
	]);
	while($query->have_posts()){
		$query->the_post();
		
		echo get_the_title()."<br>";
}
echo "<h1>Task #9: Create a query that lists lists all posts, output limit is unlimited and are ordered by ascending alphabetical order. The output must be shown as an ordered list (<ol>) with list items being each post's Post Title [Author Name] (Created Date).</h1>";
$query = new WP_Query([
	'post_type'=>'post',
	'orderby'=>'title',
	'order'=>'ASC',
	'posts_per_page'=>-1
]);
	echo "<ol>";
while($query->have_posts()):
	$query->the_post();
	echo "<li>". get_the_Title()." authors name: ".get_the_author(  )." created date: ".get_the_date( 'F j, Y g:i a' ) ."<br>";


endwhile;	

