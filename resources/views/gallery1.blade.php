
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>
<style type="text/css">
	.lead {
  padding: 40px 0;
}
/* Grid */

#posts {
  margin: 30px auto 0;
}

.post {
  margin: 0 0 20px;
  text-align: center;
  width: 100%;
}

.post img {
  padding: 0 15px;
  width: 100%;
}

#grid.container .post img {
  padding: 0;
}
/* Medium devices */

@media (min-width: 768px) {
  #grid > #posts .post {
    width: 335px;
  }
  #grid > #posts .post.cs2 {
    width: 100%;
  }
  .post img {
    padding: 0;
  }
}
/* Medium devices */

@media (min-width: 992px) {
  #grid > #posts .post {
    width: 445px;
  }
  #grid > #posts .post.cs2 {
    width: 100%;
  }
}
/* Large devices */

@media (min-width: 1200px) {
  #grid > #posts .post {
    width: 346px;
  }
  #grid > #posts .post.cs2 {
    width: 742px;
  }
}
/* Large devices min-width (1200px) + a .post margin (50px) * 2 (100px) = 1300px */
/* 1300px gives me the clearance I need to keep the margins of the entire #grid (the
bleed if you will) the same width as the .post margins posts (50px). Basically I'm
being really picky about whitespace. If you don't care, no problem, just delete this.
Can this be done with Masonry options? */

@media (min-width: 1300px) {
  #grid {
    left: -50px;
    padding-left: 50px;
    padding-right: 50px;
    position: relative;
  }
  #grid.container {
    left: auto;
    padding-left: 15px;
    padding-right: 15px;
  }
}
</style>


<!-- Posts -->

<!-- <div id="grid" class="container"> -->
<div class="container" id="grid">
  <div id="posts">
  	@foreach($images as $caption=>$url)
     @if(file_exists($url))
    <div class="post">
      <img src="{{$url}}">
      <br>
      <br>
      <strong>{{$caption}}</strong>
      
    </div>
    @endif
    @endforeach
  </div>
</div>
<script type="text/javascript">
	 // Takes the gutter width from the bottom margin of .post

	 var gutter = parseInt($('.post').css('marginBottom'));
	 var container = $('#posts');

 // Creates an instance of Masonry on #posts

 container.masonry({
   gutter: gutter,
   itemSelector: '.post',
   columnWidth: '.post'
 });

 // This code fires every time a user resizes the screen and only affects .post elements
 // whose parent class isn't .container. Triggers resize first so nothing looks weird.

 $(window).bind('resize', function() {
 	if (!$('#posts').parent().hasClass('container')) {

     // Resets all widths to 'auto' to sterilize calculations

     post_width = $('.post').width() + gutter;
     $('#posts, body > #grid').css('width', 'auto');

     // Calculates how many .post elements will actually fit per row. Could this code be cleaner?

     posts_per_row = $('#posts').innerWidth() / post_width;
     floor_posts_width = (Math.floor(posts_per_row) * post_width) - gutter;
     ceil_posts_width = (Math.ceil(posts_per_row) * post_width) - gutter;
     posts_width = (ceil_posts_width > $('#posts').innerWidth()) ? floor_posts_width : ceil_posts_width;
     if (posts_width == $('.post').width()) {
       posts_width = '100%';
     }

     // Ensures that all top-level elements have equal width and stay centered

     $('#posts, #grid').css('width', posts_width);
     $('#grid').css({
       'margin': '0 auto'
     });

   }
 }).trigger('resize');
</script>