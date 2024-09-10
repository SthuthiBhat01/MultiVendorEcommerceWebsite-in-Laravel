@extends('frontend.dashboardlayout.main')

@section('main-container')

		<!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">
			<!--************************************
					Dashboard Banner Start
			*************************************-->
			<div class="listar-dashboardbanner">
				<ol class="listar-breadcrumb">
					<li><a href="javascript:void(0);">Home</a></li>
					<li class="listar-active">Reviews</li>
				</ol>
				<h1>Reviews</h1>
				<div class="listar-description">
					<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra doloremque laudantium, totam rem aperiam</p>
				</div>
			</div>
			<!--************************************
					Dashboard Banner End
			*************************************-->
			<!--************************************
					Dashboard Content Start
			*************************************-->
			<div id="listar-content" class="listar-content">
				<form class="listar-formtheme listar-formaddlisting">
					<fieldset>
						<div class="listar-dashboardreviews">
							<div class="listar-boxtitle">
								<h3>Reviews</h3>
								<ul class="listar-actionbtns" role="tablist">
									<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Visitor Reviews</a></li>
									<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Your Reviews</a></li>
								</ul>
							</div>
							<div class="listar-dashboardreviewstabcontent tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<ul class="listar-comments">
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
													<span>1</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
														<ul class="listar-authorgallery">
															<li><figure><a href="images/img-03.jpg" data-rel="prettyPhoto[userimgone]"><img src="images/img-03.jpg" alt="image description"></a></figure></li>
															<li><figure><a href="images/img-04.jpg" data-rel="prettyPhoto[userimgone]"><img src="images/img-04.jpg" alt="image description"></a></figure></li>
														</ul>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra justo.</p>
														<p>First, please don’t fall sick. However, if in case something does catchup with you, we will airlift you to hospital but your insurance will have to pay for this. Ulins aliquam massa nisl quis neque. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut liquam massa nisl quis neque.</p>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>What a magical place, even better than I imagined! Teresa and Daniella were so helpful and awesome</p>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
													<span>1</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Very nice place</p>
														<ul class="listar-authorgallery">
															<li><figure><a href="images/img-04.jpg" data-rel="prettyPhoto[userimgtwo]"><img src="images/img-04.jpg" alt="image description"></a></figure></li>
														</ul>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
													<span>5</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo First, please don’t fall sick. However, if in case something does catchup.</p>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane" id="profile">
									<ul class="listar-comments">
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
													<span>5</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo First, please don’t fall sick. However, if in case something does catchup.</p>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
													<span>1</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
														<ul class="listar-authorgallery">
															<li><figure><a href="images/img-03.jpg" data-rel="prettyPhoto[userimgthree]"><img src="images/img-03.jpg" alt="image description"></a></figure></li>
															<li><figure><a href="images/img-04.jpg" data-rel="prettyPhoto[userimgthree]"><img src="images/img-04.jpg" alt="image description"></a></figure></li>
														</ul>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>What a magical place, even better than I imagined! Teresa and Daniella were so helpful and awesome</p>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
													<span>1</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Very nice place</p>
														<ul class="listar-authorgallery">
															<li><figure><a href="images/img-04.jpg" data-rel="prettyPhoto[userimgfour]"><img src="images/img-04.jpg" alt="image description"></a></figure></li>
														</ul>
													</div>
												</div>
											</div>
										</li>
										<li>
											<div class="listar-comment">
												<div class="listar-commentauthorbox">
													<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
													<div class="listar-authorinfo">
														<h3>Katie</h3>
														<em>Family Vacation</em>
														<span class="listar-stars"><span></span></span>
													</div>
												</div>
												<a class="listar-helpful" href="javascript:void(0);">
													<i class="icon-thumb-up2"></i>
													<span>Helpful</span>
												</a>
												<div class="listar-commentcontent">
													<time datetime="2017-09-09">
														<i class="icon-alarmclock"></i>
														<span>January 25, 2017</span>
													</time>
													<div class="listar-description">
														<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra justo.</p>
														<p>First, please don’t fall sick. However, if in case something does catchup with you, we will airlift you to hospital but your insurance will have to pay for this. Ulins aliquam massa nisl quis neque. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut liquam massa nisl quis neque.</p>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<!--************************************
						Dashboard Content End
			*************************************-->
		</main>
		
		<!--************************************
					Main End
		*************************************-->
		@endsection
		