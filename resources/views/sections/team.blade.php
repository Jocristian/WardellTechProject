<section id="team" class="gap team-section">
    <div class="container">
        <div class="heading sec-title-animation animation-style2" style="z-index: 2">
            <span class="title-animation" style="z-index: 2">Situs web yang membawa lead</span>
            <h2 class="title-animation" style="z-index: 2">Temui orang-orang hebat kami</h2>
            <p style="z-index: 2">Tingkatkan efisiensi Anda, dan buat pengalaman yang lebih baik bagi semua pihak yang terlibat. Otomatiskan alur kerja Anda dengan alat yang Anda gunakan setiap hari.</p>
        </div>
        
        <div class="row">
            @forelse ($freelancers->whereNotNull('email_verified_at')->take(3) as $freelancer)
                <div class="col-lg-4 col-md-6">
                    <div class="team">
                        <div class="expert-icon">
                            <a href="JavaScript:void(0)">
                                <i class="fa-solid fa-share-nodes"></i>
                            </a>
                            <ul class="icon-share">
                                <li><a href="JavaScript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="JavaScript:void(0)"><i class="flaticon-twitter"></i></a></li>
                            </ul>
                        </div>
                        <figure>
                            <img 
                            src="{{ $freelancer->profile_photo 
                                ? asset('storage/' . $freelancer->profile_photo) 
                                : asset('storage/'.'profile_photos/default-profile-image.jpg') }}" 
                            class="w-full h-full object-cover" 
                            alt="Profile">
                        </figure>
                        <span>Freelancer</span>
                        <h4>{{ $freelancer->name }}</h4>
                        <a href="callto:+12344502086"><i class="fa-solid fa-mobile-screen"></i><b>{{ $freelancer->email }}</b></a>
                    </div>
                </div>
            @empty
                <p>No freelancers found.</p>
            @endforelse
        </div>
    </div>
    <ul class="shaps-img">
        <li><img src="/img/shaps-3.png" alt="img" style="z-index: 1"></li>
        <li><img src="/img/shaps-5.png" alt="img" style="z-index: 1"></li>
    </ul>
</section>
