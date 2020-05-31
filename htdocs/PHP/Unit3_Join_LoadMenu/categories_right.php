<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<?php foreach ($categories as $cate) {
								
								 ?>	
							<div class="category-widget">
								<ul>
									<li><a href="category.php?id=<?=$cate['id']?>&catery=<?=$cate['title']?>" class="cat-1"><?=$cate['title']?><span><?=$cate['totalview']?></span></a></li>
									<!-- <li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
									<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
									<li><a href="#" class="cat-3">CSS<span>35</span></a></li> -->
								</ul>
							<?php } ?>
							</div>
						</div>

											<!-- tag -->

						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<?php foreach ($categories as $cate){ ?>
										
								
									<li><a href="category.php?id=<?=$cate['id']?>&catery=<?=$cate['title']?>"><?=$cate['title']?></a></li>
								<?php } ?>
									
								</ul>
							</div>
						</div>