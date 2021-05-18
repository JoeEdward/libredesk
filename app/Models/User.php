<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function PHPUnit\Framework\isEmpty;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'year',
        'enabled',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function enabledToString() {
        if ($this->enabled == 1) {
            return "True";
        } else {
            return "False";
        }

}
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }

    public function overDue() {
        $loans = $this->loans;
        $overdue = [];

        foreach ($loans as $loan) {
            if ($loan->created_at < now()) {
                $overdue = array_push($overdue, $loan);
            }
        }

        if (!isEmpty($overdue)) {
            return $overdue;
        } else {
            return null;
        }
    }

    public function userHasCurrentBook(book $book) {
        $loans = $this->loans;
        $has = false;


        foreach($loans as $loan) {
            if ($loan->book->id == $book->id) {
                $has = true;
            }
        }

        return $has;

    }

    public function getDueDate($book) {
        $loans = $this->loans;
        $found = new loan();
        $due = new \DateTime();

        foreach($loans as $loan) {
            if ($loan->book->id == $book->id) {
                $found = $loan;
                $due = $found->created_at;
                date_add($due,date_interval_create_from_date_string("14 days"));
            }
            else {
                $found = null;
            }
        }
        return ["pretty" => $due->format('l jS \\of F Y'),
                "ugly" => $due
            ];

    }
}
