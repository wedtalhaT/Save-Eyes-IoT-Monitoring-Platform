@extends('layouts.app')

@section('content')
    <div class="inner-banner-one pt-225 lg-pt-200 md-pt-150 pb-100 md-pb-70 position-relative"
         style="background-image: url(images/media/img_26.webp);">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-heading d-inline-block position-relative">
                        إدارة المستخدمين
                        <img src="images/shape/shape_33.svg" alt="">
                    </h1>
                </div>
                <div class="col-xl-4 col-lg-5 ms-auto">
                    <p class="text-white text-lg mb-40">
                        التحكم بصلاحيات المستخدمين وحذف الحسابات
                    </p>
                    <ul class="style-none d-inline-flex pager">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li>/</li>
                        <li>إدارة المستخدمين</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-150 lg-pt-80 pb-150 lg-pb-80">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد</th>
                                <th>الصلاحية</th>
                                <th class="text-end">إجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.users.role', $user->id) }}" class="d-flex align-items-center gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="role" class="form-select form-select-sm" style="max-width: 160px">
                                                <option value="user" @selected($user->role === 'user')>user</option>
                                                <option value="admin" @selected($user->role === 'admin')>admin</option>
                                            </select>
                                            <button class="btn btn-sm btn-outline-primary" type="submit">حفظ</button>
                                        </form>
                                    </td>
                                    <td class="text-end">
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" type="submit"
                                                    onclick="return confirm('تأكيد حذف المستخدم؟')">
                                                حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

