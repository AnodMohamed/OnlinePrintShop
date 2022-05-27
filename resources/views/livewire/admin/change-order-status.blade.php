

<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1> Change Status</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ route('admin.orders') }}">Manage Orders</a></li>
                    <li class="active">Change Status</li>
                </ul>
            </div>
        </section>
        <section class="page-section ">
            <div class=""  >
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                 @endif
                <form name="contact-form"   wire:submit.prevent="updateStatus" class="contact-form" id="contact-form">

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label class="sr-only" for="name">Change Status</label>
                                <select class="form-control " style="font-size: 20px;" wire:model="status">
                                    <option value="ordered" >ordered</option>
                                    <option value="delivered">delivered </option>
                                </select>
                             @error('status')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                 
                    <div class="required" style="text-align: center;">
                        <button  type="submit" class="btn  btn-theme btn-theme-dark "  style="background-color: black"> Submit</button>
                    </div>

                </form>

            </div>
        </section>
    </div>
</main>
