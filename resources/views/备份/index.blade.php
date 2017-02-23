@extends('layouts.home')
@section('content')

<!-- Banner -->
<section id="banner">
	<div class="inner">
		<h1>This is Miko, a free and fully responsive</h1>
		<ul class="actions">
		</ul>
	</div>
</section>

@foreach($article as $v)
	@endforeach

<!-- One -->
<article id="one" class="post style1">
	<div class="image">
		<img src="{{ asset('images/pic14.jpg') }}" alt="" data-position="75% center" />
	</div>
	<div class="content">
		<div class="inner">
			<header>
				<h2><a href="{{ url('art/1') }}">Ipsum lorem sed magna</a></h2>
				<p class="info">3 days ago by <a href="#">Jane Doe</a></p>
			</header>
			<p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
			<ul class="actions">
				<li><a href="{{ url('art/1') }}" class="button alt">Read More</a></li>
			</ul>
		</div>
		<div class="postnav">
			<a href="#" class="prev disabled"><span class="icon fa-chevron-up"></span></a>
			<a href="#two" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
		</div>
	</div>
</article>

<!-- Two -->
<article id="two" class="post invert style1 alt">
	<div class="image">
		<img src="{{ asset('images/pic13.jpg') }}" alt="" data-position="10% center" />
	</div>
	<div class="content">
		<div class="inner">
			<header>
				<h2><a href="{{ url('art/2') }}">Donec ex risus mollis</a></h2>
				<p class="info">3 days ago by <a href="#">Jane Doe</a></p>
			</header>
			<p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
			<ul class="actions">
				<li><a href="{{ url('art/2') }}" class="button alt">Read More</a></li>
			</ul>
		</div>
		<div class="postnav">
			<a href="#one" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
			<a href="#three" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
		</div>
	</div>
</article>

<!-- Three -->
<article id="three" class="post style2">
	<div class="image">
		<img src="{{ asset('images/pic12.jpg') }}" alt="" data-position="80% center" />
	</div>
	<div class="content">
		<div class="inner">
			<header>
				<h2><a href="{{ url('art/3') }}">Sed tempus interdum</a></h2>
				<p class="info">3 days ago by <a href="#">Jane Doe</a></p>
			</header>
			<p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
			<ul class="actions">
				<li><a href="{{ url('art/3') }}" class="button alt">Read More</a></li>
			</ul>
		</div>
		<div class="postnav">
			<a href="#two" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
			<a href="#four" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
		</div>
	</div>
</article>

<!-- Four -->
<article id="four" class="post invert style2 alt">
	<div class="image">
		<img src="{{ asset('images/pic14.jpg') }}" alt="" data-position="60% center" />
	</div>
	<div class="content">
		<div class="inner">
			<header>
				<h2><a href="{{ url('art/4') }}">Adipiscing sed urna</a></h2>
				<p class="info">3 days ago by <a href="#">Jane Doe</a></p>
			</header>
			<p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
			<ul class="actions">
				<li><a href="{{ url('art/4') }}" class="button alt">Read More</a></li>
			</ul>
		</div>
		<div class="postnav">
			<a href="#three" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
			<a href="#five" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
		</div>
	</div>
</article>

<!-- Five -->
<article id="five" class="post style3">
	<div class="image">
		<img src="{{ asset('images/pic13.jpg') }}" alt="" data-position="5% center" />
	</div>
	<div class="content">
		<div class="inner">
			<header>
				<h2><a href="{{ url('art/5') }}">Interdum et rutrum</a></h2>
				<p class="info">3 days ago by <a href="#">Jane Doe</a></p>
			</header>
			<p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
			<ul class="actions">
				<li><a href="{{ url('art/5') }}" class="button alt">Read More</a></li>
			</ul>
		</div>
		<div class="postnav">
			<a href="#four" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
			<a href="#six" class="scrolly next"><span class="icon fa-chevron-down"></span></a>
		</div>
	</div>
</article>

<!-- Six -->
<article id="six" class="post invert style3 alt">
	<div class="image">
		<img src="{{ asset('images/pic12.jpg') }}" alt="" data-position="80% center" />
	</div>
	<div class="content">
		<div class="inner">
			<header>
				<h2><a href="{{ url('art/6') }}">Magna porta aliquam</a></h2>
				<p class="info">3 days ago by <a href="#">Jane Doe</a></p>
			</header>
			<p>Nullam posuere erat vel placerat rutrum. Praesent ac consectetur dui, et congue quam. Donec aliquam lacinia condimentum. Integer porta massa sapien, commodo sodales diam suscipit vitae. Aliquam quis felis sed urna semper semper. Phasellus eu scelerisque mi. Vivamus aliquam nisl libero, sit amet scelerisque ligula laoreet vel.</p>
			<ul class="actions">
				<li><a href="{{ url('art/6') }}" class="button alt">Read More</a></li>
			</ul>
		</div>
		<div class="postnav">
			<a href="#five" class="scrolly prev"><span class="icon fa-chevron-up"></span></a>
			<a href="#" class="scrolly next disabled"><span class="icon fa-chevron-down"></span></a>
		</div>
	</div>
</article>
	@endsection

