<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>Add Driver</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ route('admin.drivers') }}">Manage Drivers</a></li>
                    <li class="active">Add Driver</li>
                </ul>
            </div>
        </section>
        <section class="page-section ">
            <div class="container"  style="width:1000px">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                 @endif
                <form name="contact-form"   wire:submit.prevent="storeDriver" class="contact-form" id="contact-form">

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="name">Name</label>
                            <input type="text" wire:model="name" name="name" id="name" placeholder="Name" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Name is required">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="email">Email</label>
                            <input type="email" wire:model="email" name="email" id="email" placeholder="Email" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Email is required">
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                             @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="subject">Password</label>
                            <input type="password" wire:model="password"  name="password" id="password" placeholder="Password" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Password is required">
                            @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                             @enderror
                        </div>
                    </div>

                    <div class="required" style="text-align: center;">
                        <button  type="submit" class="btn  btn-theme btn-theme-dark " > Add Driver</button>
                    </div>

                </form>

            </div>
        </section>
    </div>
</main>
