@extends('layouts.admin')

@section('content')
<div class="container">
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
                    <?php $monthlyTotalMinutes = $user->getMonthlyTotalWorkingMinutes($year, $i); ?>
                    <td style="width: 7%">{{ $monthlyTotalMinutes == 0 ? "-" : getFormatedDatetimeFromMinutes($monthlyTotalMinutes) }}</td>
                  @endfor
            　</tr>
          @endforeach
      </tbody>
    </table>
</div>
@endsection