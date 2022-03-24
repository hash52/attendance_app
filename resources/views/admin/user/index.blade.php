@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-2">
            <form action="{{ action('Admin\UserController@index') }}" method="get" id="yearForm">
                <select name="year" class="form-control">
                    @foreach($year_selections as $year)
                      <option value={{ $year }} @if($year == $displayed_year) selected @endif >{{ $year }}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>名前</th>
          @for($i = 1; $i <= 12; $i++)
            <th>{{ $i }}月</th>
          @endfor
        </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
            　<tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td>{{ $user->name }}</td>
                  @for($i = 1; $i <= 12; $i++)
                    <?php $monthlyTotalMinutes = $user->getMonthlyTotalWorkingMinutes($displayed_year, $i); ?>
                    <td style="width: 7%">{{ $monthlyTotalMinutes == 0 ? "-" : getFormatedDatetimeFromMinutes($monthlyTotalMinutes) }}</td>
                  @endfor
            　</tr>
          @endforeach
      </tbody>
    </table>
</div>
@endsection