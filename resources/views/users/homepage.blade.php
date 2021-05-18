@extends('layouts.main')
@section('title', 'Home')
@section('content')

<div class="row">

	<div class="col-6">

		<div class="row m-auto">
<!-- Top Right Box -->
			<div class="rounded bg-light col-12 ml-1 mt-3">
				<div class="row">
					<div class=" container-fixed bg-primary rounded-circle text-center justify-content-center m-4" style="height: 5rem; width: 5rem;">
						<p class="mt-2 lead" style="padding-top: 1.1rem">{{ 0 }}</p>
					</div>
					<div class=" container-fixed rounded-circle m-auto text-center justify-content-center" style="height: 5rem; width: 5rem; background-color: #9fff80">
						<p class="mt-2 lead" style="padding-top: 1.1rem">{{ count(auth()->user()->loans) }}</p>
					</div>
					<div class=" container-fixed rounded-circle text-center justify-content-center m-4" style="height: 5rem; width: 5rem; background-color: #ff6666">
						<p class="mt-2 lead" style="padding-top: 1.1rem">{{ auth()->user()->overDue() == null ? 0 : count(auth()->user()->overdue()) }}</p>
					</div>
				</div>
				<div class="row">
					<p class="col-4 text-left">
						Notifications
					</p>
					 <p class="col-4 text-center">
                            <a href="/loans">Loans</a>
                    </p>
					<p class="col-4 text-right" style="padding-right: 2.2rem">
						<a href="/overdue">Overdue</a>
                    </p>
				</div>
			</div>
		</div>
		<div class="row m-auto">
<!-- Bottom Left Box -->
            @isset($motd)
                <div class="rounded bg-light col-12 ml-1 mt-3" style="height: 29rem; overflow: hidden">
                    <div class="row">
                        <div class="col-6">
                            <img style="padding: 1.1rem; width: 100%; height: auto" src="{{url($motd->img)}}">
                        </div>
                        <div class="col-6" style="padding: 1.1rem">
                            <h2 style="text-align: center">{{$motd->title}}</h2>
                            <br>
                            <p style="text-align: center; overflow: scroll; height:20rem">{{$motd->description}}</p>
                        </div>
                    </div>
                </div>
                <br>

            @else
                <div class="alert alert-primary">
                    <h3>Currently No MOTD Set</h3>
                </div>
            @endisset

		</div>

	</div>
	<div class="col-6">
<!-- Right Hand Box -->
		<div class="col-12 bg-light rounded mr-1 mt-3" style="height: 40rem">
<!-- Book Search Box -->
		<div class="container" style="padding-top: 1.1rem">
			<form class="col-12" action="/search/" method="get">
				<div class="form-group row">
					<label for="search" class="col-2" style="font-size: 18px; padding-top: 0.2rem">Search:</label>
					<input type="text" name="search" class="col-10 form-control" required>
				</div>
			</form>
		</div>
		<div class="container" style="padding-top: 1.1rem">

			<h3 style="padding-left: .7rem">Recommended:</h3>

            @foreach($books as $book)

                @if($book->id <= 3)
                    @include('prefabs/recommendedCard', ['book', $book])
                @else

                @endif

            @endforeach

		</div>

	</div>
</div>

@endsection
