<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Users</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-3">
            <aside>
                <form action="{{ route('users.index') }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ request()->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ request()->email }}">
                    </div>

                    <div class="form-group">
                        <label for="is_active">Is Active</label> <br>
                        <label for="is_active">Yes</label>
                        <input type="radio" name="is_active" id="is_active" value="1" {{ request()->is_active == \App\Models\User::$ACTIVE ? 'checked' : ''}}>
                        <label for="is_not_active">No</label>
                        <input type="radio" name="is_active" id="is_not_active" value="0" {{ request()->is_active == \App\Models\User::$NOT_ACTIVE ? 'checked' : ''}}>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="text" class="form-control" name="birthday" value="{{ request()->birthday }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender">
                            <option value="{{ \App\Models\User::$GENDER_MALE }}" {{ request()->gender == \App\Models\User::$GENDER_MALE ? 'selected' : '' }}>{{ \App\Models\User::$GENDER_MALE_TITLE }}</option>
                            <option value="{{ \App\Models\User::$GENDER_FEMALE }}" {{ request()->gender == \App\Models\User::$GENDER_FEMALE ? 'selected' : '' }}>{{ \App\Models\User::$GENDER_FEMALE_TITLE }}</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </aside>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">is active</th>
            <th scope="col">gender</th>
            <th scope="col">birthday</th>
        </tr>
        </thead>
        <tbody>

        @php /** @var \App\Models\User $user */ @endphp
        @foreach($users as $user)
            @include('user.partials.user-row', $user)
        @endforeach
        </tbody>

    </table>
</div>
</body>
</html>
