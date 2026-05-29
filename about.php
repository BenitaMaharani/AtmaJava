<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <link rel="icon" type="image/png" href="assets/img_logo/logoatma.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

</head>
<body>

<!-- ================= NAVBAR ================= -->
<?php include 'components/navbar.php'; ?>

<!-- ================= ABOUT ================= -->

<section class="about">

    <h1>About Us</h1>

    <div class="about-hero">
        
        <div class="about-logo">
            <img src="assets/img_logo/logoatma.png" alt="Logo Atma Java">
        </div>

        <div class="about-hero-content">
            
            <div class="about-tagline">
                "Dalam bahasa Sansekerta, Atma berarti "jiwa" atau "napas". Gunung-gunung di Pulau Jawa adalah napas bagi ekosistem dan budaya di sekitarnya. Nama ini merepresentasikan website yang menjadi "jiwa" dari informasi gunung di Jawa—menyajikan data dengan penuh penghormatan terhadap alam."
            </div>

            <div class="about-makna-box">
                <h2>Makna Slogan</h2>
                <div class="makna-sub">
                    <strong>"Jejak Data":</strong>
                    <p>Bukan sekadar bercerita tentang keindahan gunung, tetapi kami juga menelusuri data, angka, dan fakta ilmiah yang tertinggal sebagai "jejak" dari waktu ke waktu.</p>
                </div>
                <div class="makna-sub">
                    <strong>"Di Balik Fenomena":</strong>
                    <p>Fenomena adalah apa yang kita lihat di permukaan—keindahan puncak, letusan, atau upacara adat. "Di Balik" artinya kami menyelami, menganalisis, dan mengungkap cerita, alasan, dan kebenaran yang tidak terlihat secara langsung.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="aspirasi">
        <h2>ASPIRASI KAMI</h2>
        <p>
            "Menjadi jurnal digital terkemuka yang mengabadikan esensi pegunungan Jawa melalui harmoni data, edukasi, dan estetika."
        </p>
    </div>

    <div class="langkah">
        <h2>LANGKAH KAMI</h2>
        <ul>
            <li><strong>Literasi Alam:</strong> Menyediakan basis data geologi dan profil gunung secara akurat untuk keamanan dan pengetahuan.</li>
            <li><strong>Konservasi Narasi:</strong> Mendokumentasikan kekayaan ekosistem dan warisan budaya yang membentuk identitas setiap puncak.</li>
            <li><strong>Etika Penjelajahan:</strong> Menginspirasi standar keselamatan dan kesadaran lingkungan bagi para penggiat alam.</li>
            <li><strong>Estetika Informasi:</strong> Menghadirkan ruang informasi yang bersih dan eksklusif untuk pengalaman pengguna yang mendalam.</li>
        </ul>
    </div>

    <div class="team-section">
        <div class="team-left">
            <h2>TIM/KONTRIBUTOR</h2>
            <div class="team-container-flex">
                <div class="team-names">
                    <div class="member-item">1. Benita Maharani Roja.</div>
                    <div class="member-item">2. Haya Salsabil Fadiyah.</div>
                    <div class="member-item">3. Krinca Bilqis Athariga.</div>
                    <div class="member-item">4. Sindi Dwi Kartika.</div>
                    <div class="member-item">5. Wiqie Silviana Ernesia N.</div>
                </div>
                <div class="team-contacts">
                    <div class="contact-title">CONTACT <i class="fab fa-instagram"></i></div>
                    <div class="member-item"><a href="https://instagram.com/goisseigo" target="_blank">@goisseigo</a></div>
                    <div class="member-item"><a href="https://instagram.com/hayl_yaya" target="_blank">@hayl_yaya</a></div>
                    <div class="member-item"><a href="https://instagram.com/xyhzcawkl" target="_blank">@xyhzcawkl</a></div>
                    <div class="member-item"><a href="https://instagram.com/ssnndw._" target="_blank">@ssnndw._</a></div>
                    <div class="member-item"><a href="https://instagram.com/wiq1e" target="_blank">@wiq1e</a></div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include 'components/footer.php'; ?>

</body>
</html>