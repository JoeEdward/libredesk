@extends('layouts.main')
@section('title', 'Home')
@section('content')

<div class="row">

	<div class="col-6">

		<div class="row m-auto">

			<div class="rounded bg-light col-12 ml-1 mt-3">
				<div class="row">
					<div class=" container-fixed bg-primary rounded-circle text-center justify-content-center m-4" style="height: 5rem; width: 5rem;">
						<p class="mt-2 lead" style="padding-top: 1.1rem">1</p>
					</div>
					<div class=" container-fixed bg-primary rounded-circle m-auto text-center justify-content-center" style="height: 5rem; width: 5rem;">
						<p class="mt-2 lead" style="padding-top: 1.1rem">1</p>
					</div>
					<div class=" container-fixed bg-primary rounded-circle text-center justify-content-center m-4" style="height: 5rem; width: 5rem;">
						<p class="mt-2 lead" style="padding-top: 1.1rem">1</p>
					</div>
				</div>
				<div class="row">
					<p class="col-4 text-left">
						Notifications
					</p>
					<p class="col-4 text-center">
						Loans
					</p>
					<p class="col-4 text-right" style="padding-right: 2.2rem">
						Overdue
					</p>
				</div>
			</div>
		</div>
		<div class="row m-auto">

			<div class="rounded bg-light col-12 ml-1 mt-3" style="height: 33rem;">

			</div>

		</div>

	</div>
	<div class="col-6">
		<div class="col-12 bg-light rounded mr-1 mt-3" style="height: 44.4rem">
	</div>
</div>

@endsection