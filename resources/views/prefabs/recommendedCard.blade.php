<a href="/user/book/{{ $book->id }}" class="link-dark"><div class="card" style="margin-top: 1.1rem">
				<div class="card-body" style="color: rgba(0,0,0,0.98)">
				<div class="row">
					<img class="col-2" src="{{ $book->img }}">
					<p class="col-10">
                        {{ $book->title }}<br>
                        {{ $book->author->first_name }}, {{ $book->author->Last_name }}<br>
                        {{ $book->blurb }}
                    </p>
				</div>
				</div>
			</div></a>
