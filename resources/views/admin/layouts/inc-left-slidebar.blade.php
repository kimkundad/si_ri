<style>

ul.nav-main > li.nav-expanded > a {
  box-shadow: 2px 0 0 #ee413c inset;
}
html.no-overflowscrolling .nano > .nano-pane > .nano-slider {
    background: #ee413c;
}
.page-header h2 {
    border-bottom-color: #ee413c;
}
</style>
<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar" ></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">


									<li {{ (Request::is('admin/dashboard*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/dashboard/')}}"  >
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>ส่วนควบคุม</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/user*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/user/')}}"  >
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>รายชื่อสมาชิก</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/category*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/category/')}}"  >
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>จัดการหมวดหมู่</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/property*') ? 'class=nav-expanded' : '') }} {{ (Request::is('admin/searchproperty*') ? 'class=nav-expanded' : '') }}>
										<a href="{{url('admin/property/')}}"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>จัดการอสังหา</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/recom_property*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/recom_property/')}}"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>จัดการอสังหา Recom</span>
										</a>
									</li>


                  <li {{ (Request::is('admin/new_property*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/new_property/')}}"  >
											<i class="fa fa-cubes" aria-hidden="true"></i>
											<span>จัดการอสังหา New</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/classifieds*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/classifieds/')}}"  >
											<i class="fa fa-bullseye" aria-hidden="true"></i>
											<span>เขียนบทความ</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/bts*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/bts/')}}"  >
											<i class="fa fa-train" aria-hidden="true"></i>
											<span>รถไฟฟ้า</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/envelope*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/envelope/')}}"  >
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<span>จัดการข้อความ</span>
										</a>
									</li>
                  <li {{ (Request::is('admin/slideshows*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/slideshows/')}}"  >
											<i class="fa fa-star" aria-hidden="true"></i>
											<span>จัดการ slideshows</span>
										</a>
									</li>



                  <li {{ (Request::is('admin/setting*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/setting/')}}"  >
											<i class="fa fa-cog " aria-hidden="true"></i>
											<span>ตั้งค่าเว็บไซต์</span>
										</a>
									</li>




								</ul>



							</nav>



							<hr class="separator" />


						</div>

					</div>

				</aside>
				<!-- end: sidebar -->
