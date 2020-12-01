
<!-- BEGIN CONTENT WRAPPER -->
<div class="content">
	<div class="container">
		<div class="row">
		
			<!-- BEGIN MAIN CONTENT -->
			<div class="main col-sm-8">
			
				<h1 class="blog-title">$Title</h1>
				
				<div class="blog-main-image">
					<% with $Photo.ScaleWidth(450) %>
					<img class="my-customer-class" src="$URL" alt="dummyimg" height="$Height"/>
					<% end_with %>
					<p>$Teaser</p>
					<p>$Author</p>					
				</div>

				<% if $Brochure %>
					<div class="row">
					  <div class="col-sm-12"><a class="btn btn-warning btn-block" href="$Brochure.URL"> Download brochure ($Brochure.Extension, $Brochure.Size)</a>
					  </div>
					</div>
				<% end_if %>
				
				<div class="blog-bottom-info">
					<ul>
						<li><i class="fa fa-calendar"></i>$Date</li>
						<li><i class="fa fa-comments-o"></i> 3 Comments</li>
						<li><i class="fa fa-tags"></i> Properties, Prices, best deals</li>
					</ul>
					
					<div id="post-author"><i class="fa fa-pencil"></i> By John Doe</div>
				</div>
				
				<div class="post-content">
					$Content
				</div>
				
				<div class="share-wraper col-sm-12 clearfix">
					<h5>Share this Post:</h5>
					<ul class="social-networks">
						<li><a target="_blank" href="http://www.facebook.com/sharer.php?s=100&amp;p%5Burl%5D=http%3A%2F%2Fwww.wiselythemes.com%2Fhtml%2Fcozy%2Fblog-detail.html%3Ffb%3Dtrue&amp;p%5Bimages%5D%5B0%5D=http%3A%2F%2Fwww.wiselythemes.com%2Fhtml%2Fcozy%2Fimages%2Fnews-img1.jpg&amp;p%5Btitle%5D=Cozy%20Blog%20Post"><i class="fa fa-facebook"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/intent/tweet?url=http://www.wiselythemes.com/html/cozy/blog-detail.html&amp;text=Cozy%20Blog%20Post"><i class="fa fa-twitter"></i></a></li>
						<li><a target="_blank" href="https://plus.google.com/share?url=http://www.wiselythemes.com/html/cozy/blog-detail.html"><i class="fa fa-google"></i></a></li>
						<li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=http://www.wiselythemes.com/html/cozy/blog-detail.html&amp;description=Cozy%20Blog%20Post&amp;media=http%3A%2F%2Fwww.wiselythemes.com%2Fhtml%2Fcozy%2Fimages%2Fnews-img1.jpg"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="mailto:?subject=Check%20out%20this%20blog%20post%20from%20Cozy%20Real%20Estate!&amp;body=http://www.wiselythemes.com/html/cozy/blog-detail.html"><i class="fa fa-envelope"></i></a></li>
					</ul>
					
					<a class="print-button" href="javascript:window.print();">
						<i class="fa fa-print"></i>
					</a>
				</div>
				
				<h1 class="section-title">Comments</h1>
				
				<div class="comments">
					<ul>
						<li>
							<img src="images/comment-man.jpg" alt="" />
							<div class="comment">
								<a href="#" class="btn btn-default-color">Reply</a>
								<h3>John Doe<small>30 July, 2014</small></h3>
								<p>Etiam eget felis lacus. In hendrerit, urna in fringilla interdum, nunc mauris condimentum purus, vel ullamcorper dui risus sed tellus. Nullam lacinia porttitor velit fermentum accumsan. Etiam dui lorem, lobortis pellentesque malesuada nec, lacinia pulvinar libero.</p>
							</div>
							<ul>
								<li>
									<img src="images/comment-man.jpg" alt="" />
									<div class="comment">
										<a href="#" class="btn btn-default-color">Reply</a>
										<h3>John Doe<small>30 July, 2014</small></h3>
										<p>In hendrerit, urna in fringilla interdum, nunc mauris condimentum purus, vel ullamcorper dui risus sed tellus. Nullam lacinia porttitor velit fermentum accumsan. Etiam dui lorem, lobortis pellentesque malesuada nec, lacinia pulvinar libero.</p>
									</div>
								</li>
							</ul>
						</li>
						<li>
							<img src="images/comment-woman.jpg" alt="" />
							<div class="comment">
								<a href="#" class="btn btn-default-color">Reply</a>
								<h3>Mary Doe<small>31 July, 2014</small></h3>
								<p>Etiam eget felis lacus. In hendrerit, urna in fringilla interdum, nunc mauris condimentum purus, vel ullamcorper dui risus sed tellus. Nullam lacinia porttitor velit fermentum accumsan. Etiam dui lorem, lobortis pellentesque malesuada nec, lacinia pulvinar libero. Quisque pretium nunc sed nisl vehicula gravida. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</li>
					</ul>
					
					
	<!-- Lession 7 implementing view of brochure and image-->
 	<% if $Brochure %>
      <div class="row">
      <% with $Brochure %>
        <div class="col-sm-12"><a class="btn btn-warning btn-block" href="$Brochure.URL"> Download brochure ($Brochure.Extension, $Brochure.Size)</a>
        </div>
        <% end_with %>
      </div>
   	<% end_if %>

   <% if $Photo %>
		<% with $Photo.ScaleWidth(750) %>
			<img class="my-custom-class" src="$URL" alt="" width="$Width" height="$Height" />
		<% end_with %>
	<% end_if %>

<!--<li><i class="fa fa-tags"></i> 
<% loop $Categories %> $Title <% if not $Last %>, <% end_if %><% end_loop %>
</li>-->
<br/>
<li><i class="fa fa-tags"></i> $CategoriesList</li>


			</div>	
			<!-- END MAIN CONTENT -->
			
		

		</div>
	</div>
</div>
