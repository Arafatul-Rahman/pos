<!-- User menu -->
<div class="sidebar-user">
	<div class="category-content">
		<div class="media">
			<a href="#" class="media-left">
			@if(Auth::guard('user')->user()->image)         
			     <img src="{{asset('/backEnd/admin')}}/assets/uploads/user/{{ Auth::guard('user')->user()->image}}" class="img-circle img-sm" alt="">       
			@else
				<img src="{{asset('/backEnd/admin')}}/assets/images/user/demo.jpg" alt="">
			@endif
			</a>
			<div class="media-body">
				<span class="media-heading text-semibold">{{ Auth::guard('user')->user()->name}}</span>
				<div class="text-size-mini text-muted">
					<i class="icon-pin text-size-small"></i> &nbsp;{{ Auth::guard('user')->user()->address}}
				</div>
			</div>

			<div class="media-right media-middle">
				<ul class="icons-list">
					<li>
						<a href="#"><i class="icon-cog3"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- /user menu -->