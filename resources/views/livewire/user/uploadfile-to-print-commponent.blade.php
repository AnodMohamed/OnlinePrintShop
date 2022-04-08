

<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1> Upload file to print </h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Upload file to print</li>
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
                <form name="contact-form"   wire:submit.prevent="store" class="contact-form" id="contact-form" enctype="multipart/form-data">




                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label for="name"> Name</label>
                            <input type="text" wire:model="name"  name="name" id="name" placeholder="Product Name" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Product is required">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="file"> File </label>
                            <input type="file" wire:model="file" name="file" id="file" placeholder="file" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="File is required">

                            @error('file')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                           
                        </div>
                    </div> 



                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="from"> Print From </label>
                            <input type="text" wire:model="from" name="from" id="from" placeholder="from" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title=" Print from is required">
                            @error('from')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="to"> Print To  </label>
                            <input type="text" wire:model="to" name="to" id="to" placeholder="to" value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title=" Print to  is required">
                            @error('to')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="printColor"> Print Color</label>
                            <select wire:model="printColor" name="printColor" id="printColor" placeholder="printColor " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Print Color is required">
                                <option value="">Select</option>
                                <option value="Black And White">Black And White </option>
                                <option value="Colorful">Colorful </option>
                            </select>
                            @error('printColor')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div> 

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="printType"> Print type</label>
                            <select wire:model="printType" name="printType" id="printType" placeholder="Print Type " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Print Type is required">
                                <option value="">Select</option>
                                <option value="One face">One face </option>
                                <option value="Two face">Two face  </option>
                            </select>
                            @error('printType')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="outer required" >
                        <div class="form-group af-inner">
                            <label  for="printWay"> Print way</label>

                            <select wire:model="printWay" name="printWay" id="printWay" placeholder="printWay " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Print way is required">
                                <option value="">Select</option>
                                <option value="Vertical">Vertical </option>
                                <option value="Horizontal">Horizontal </option>
                            </select>
                            @error('printWay')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required" >
                        <div class="form-group af-inner">
                            <label  for="paperType" > Paper type</label>

                            <select wire:model="paperType" name="paperType" id="paperType" placeholder="paperType " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Paper Type is required">
                                <option value="">Select</option>
                                <option value="Inkjet Printer Paper">Inkjet Printer Paper </option>
                                <option value="Laser Printer Paper">Laser Printer Paper </option>
                                <option value="Bright White">Bright White </option>
                                <option value="Glossy">Glossy </option>
                                <option value="Card Stock">Card Stock </option>
                                <option value="Matte">Resume </option>

                            </select>
                            @error('paperType')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
            

                    <div class="outer required" >
                        <div class="form-group af-inner">
                            <label  for="paperSize" > Paper Size</label>

                            <select wire:model="paperSize" name="paperSize" id="paperSize" placeholder="paperSize " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Paper size is required">
                                <option value="">Select</option>
                                <option value="A1">A1 </option>
                                <option value="A2">A2 </option>
                                <option value="A3">A3 </option>
                                <option value="A4">A4 </option>
                                <option value="A6">A5 </option>
                                <option value="A6">A6 </option>
                                <option value="A7">A7 </option>
                                <option value="A8">A8 </option>
                                <option value="A9">A9 </option>
                                <option value="A10">A10 </option>

                            </select>
                            @error('paperSize')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required" >
                        <div class="form-group af-inner">
                            <label  for="coverType" > Cover type </label>

                            <select wire:model="coverType" name="coverType" id="coverType" placeholder="Cover Type " value=""  data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Cover Type is required">
                                <option value="">Select</option>
                                <option value="No stapling and no wrapping">No stapling and no wrapping , price : 0</option>
                                <option value="Lamination">Lamination , price : 3</option>
                                <option value="Plastic wire">Plastic wire , price : 8</option>
                                <option value="Iron wire">Iron wire , price : 9</option>
                                <option value="Horizontal stapling ">horizontal stapling , price : 0</option>
                                <option value="Vertical stapling  ">Vertical stapling , price : 0</option>
                                <option value="Corner stapling  ">Corner stapling , price : 0</option>
                            </select>
                            @error('coverType')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                 
                    
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

                    <div class="required" style="text-align: center;">
                        <button  type="submit" class="btn  btn-theme btn-theme-dark " > Submit</button>
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
