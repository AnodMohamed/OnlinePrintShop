

<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1> Upload Image For Accessory </h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Upload Image For Accessory</li>  
                    <li class="active"> {{ $name }} </li>
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
                <form name="contact-form"   wire:submit.prevent="storeImage" class="contact-form" id="contact-form" enctype="multipart/form-data">


                

                    <div class="outer required" wire:ignore>
                        <div class="form-group af-inner">
                            <label  for="note">Note </label>
                            <textarea type="text" wire:model="note" name="note" id="note" placeholder="Short Description" value=""  title="" class="form-control placeholder" ></textarea>
                            @error('note')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="printType"> Print Type </label>
                            <select wire:model="printType" name="printType" id="printType" placeholder="Print Type " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Print Type is required">
                                <option value="">Select </option>
                                <option value="blackAndWhite">Black And White </option>
                                <option value="outofstock">Colorful</option>
                            </select>
                            @error('printType')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>   




                <div class="outer required">
                    <div class="form-group af-inner">
                        <label  for="image"> Product Image</label>
                        <input type="file" wire:model="image" name="image" id="image" placeholder="Product Image " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Product Image is required">

                        @error('image')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                       
                        @if ($image)
                            <img src="{{$image->temporaryUrl()}}" width="120" hieght="120" />
                        @endif  
                    </div>
                </div> 

                
                <div class="required" style="text-align: center;">
                        <button  type="submit" class="btn  btn-theme btn-theme-dark " > Add Product</button>
                </div>

                </form>

            </div>
        </section>
    </div>
</main>
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector: '#note',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#note').val();
                        @this.set('note', sd_data);
                    })
                }
            });
        });
    </script>
@endpush
