<footer>
    <style>
        @media (min-width: 320px) and (max-width: 480px) 
        {

            #normal{
                display: none !important;
            }

            #mobile{
                display: block !important;
            }

        }
    </style>
    <div class="w-100 mt-3 d-block" style="padding: 20px">
        <div id="mobile" class="container-fluid py-4 w-100" style="display: none; margin-top: 10px; margin-bottom: -10px">
            <div class="d-block" style="width: 100%; text-align: center">
                    <h5 style="margin-bottom: 20px"><img src="{{ asset('storage/'. $profil->logoDesa) }}" alt="" style="height: 80px; margin-right: 10px;"></h5>
                
                    <h3 style="font-family: 'Raleway', sans-serif; color: whitesmoke; font-size: 29px; margin-top: 8px; text-transform: capitalize">{{ $other->shortTitle }} {{ $profil->namaDesa }}</h3>

                    <p style="font-size: 13px; margin-top: -10px; color: whitesmoke; text-transform: capitalize">{{ $other->fullTitle }} {{ $profil->namaDesa }}</p>

                    <p style="color: whitesmoke;">Waktu Operasional : </p>
                    <p style="color: whitesmoke;">{{ $other->operationDay }}    ({{ $other->operationTime }}) </p>

                    {{-- <div style="margin-top: 5px;">
                        <p style="text-align: justify; color: whitesmoke">{{ $other->informationSystem }}</p>
                    </div> --}}
            </div>
        </div>
        <div id="normal" class="container-fluid d-flex py-4 px-3" style="width: 100%">
            <div class="d-inline-block" style="width: 30%;">
                <div class="d-inline-flex">
                    <h4><img src="{{ asset('storage/'. $profil->logoDesa) }}" alt="" style="height: 60px; margin-right: 10px;"></h4>
                    
                    <div>
                        <h3 style="font-family: 'Raleway', sans-serif; color: whitesmoke; font-size: 29px; margin-top: 8px; text-transform: capitalize">{{ $other->shortTitle }} {{ $profil->namaDesa }}</h3>
                        <p style="font-size: 14px; margin-top: -10px; color: whitesmoke; text-transform: capitalize">{{ $other->fullTitle }} {{ $profil->namaDesa }}</p>
                    </div>
                    
                </div>
                <div style="margin-top: 5px">
                    <p style="text-align: justify; color: whitesmoke">{{ $other->informationSystem }}</p>
                </div>
                
                
            </div>
    
            <div class="d-inline-flex" style="margin-top: 4px; width: 70%; justify-content: end">
                <div class="d-block" style="margin-right: 30px; width: 20%">
                    <p style=" color: whitesmoke;font-size: 22px; font-weight: bold">Quick Link</p>
                    <a class="nvh" href="/homePublic" style="text-decoration: none; color: whitesmoke;font-size: 17px">Home</a><br>
                    <a class="nvh" href="/informasiPublic" style="text-decoration: none; color: whitesmoke;font-size: 17px">Informasi Desa</a><br>
                    <a class="nvh" href="/pelayananPublic" style="text-decoration: none; color: whitesmoke;font-size: 17px">Pelayanan Desa</a>
                </div>
    
                <div class="d-block" style="margin-right: 50px; width: 20%">
                    <p style=" color: whitesmoke;font-size: 22px; font-weight: bold">Contact Us</p>
                    <p style="text-decoration: none; color: whitesmoke;font-size: 17px">Telp. {{ $other->contactUsTelpon }}</p>
                    <p style="text-decoration: none; color: whitesmoke;font-size: 17px; margin-top: -15px">{{ $other->contactUsEmail }}</p>
                </div>
    
                <div class="d-block" style="margin-right: 30px; width: 30%">
                    <p style=" color: whitesmoke;font-size: 22px; font-weight: bold">Waktu Operasional</p>
                    <p style="text-decoration: none; color: whitesmoke;font-size: 17px">{{ $other->operationDay }}</p>
                    <p style="text-decoration: none; color: whitesmoke;font-size: 17px; margin-top: -15px">{{ $other->operationTime }}</p>
                    
                </div>
            </div>
        </div>
    

        <div id="mobile" class="container-fluid ftTopp" style="display: none">
            <div class="ftTop text-center" style="width: 100%; justify-content: center">
                <div class="d-block">
                    <div style="margin-top: 40px; margin-bottom: 25px" class="d-inline-flex">
                        <a href="{{ $other->youtubeLink }}" target="-blank"><h2 class="bi bi-youtube nvh" style="color: white; margin-right: 30px; width: 50px; height: 50px;"></h2></a>

                        <a href="{{ $other->facebookLink }}" target="-blank"><h2 class="bi bi-facebook nvh" style="color: white; margin-right: 30px; width: 50px; height: 50px;"></h2></a>

                        <a href="{{ $other->instagramLink }}" target="-blank"><h2 class="bi bi-instagram nvh" style="color: white; margin-right: 30px; width: 50px; height: 50px;"></h2></a>

                        <a href="{{ $other->googleLink }}" target="-blank"><h2 class="bi bi-google nvh" style="color: white; margin-right: 30px; width: 50px; height: 50px;"></h2></a>

                        
                        <a href="{{ $other->whatsAppLink }}" target="-blank"><h2 class="bi bi-whatsapp nvh" style="color: white; width: 50px; height: 50px;"></h2></a>
                    </div>
                    
                    <p style="color: whitesmoke; text-transform: capitalize">Copyright &copy; {{ $other->shortTitle }} {{ $profil->namaDesa }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
