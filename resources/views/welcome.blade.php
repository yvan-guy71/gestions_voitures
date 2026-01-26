@extends('layouts.app')
@section('title', 'Bienvenue chez DriveUp')
@section('content')

    <div class="hero">
        <div class="hero-content">
            <h1>Bienvenue chez DriveUp</h1>
            <p>Votre solution complète de gestion automobile. Nous prenons soin de votre véhicule avec expertise et passion.
            </p>
            <div class="hero-actions">
                <div class="action-card">
                    <h4>Propriétaires de véhicules</h4>
                    <p style="font-size: 0.9rem; margin-bottom: 1.5rem; color: #d1d5db;">Enregistrez votre véhicule pour un
                        suivi professionnel et rapide.</p>
                    <a href="{{ route('vehicules.create') }}" class="btn btn-primary">Enregistrer un Véhicule</a>
                </div>
                <div class="action-card">
                    <h4>Professionnels</h4>
                    <p style="font-size: 0.9rem; margin-bottom: 1.5rem; color: #d1d5db;">Rejoignez notre équipe d'experts et
                        développez votre activité.</p>
                    <a href="{{ route('techniciens.create') }}" class="btn btn-secondary">Devenir Technicien</a>
                </div>
            </div>
        </div>
    </div>

    <section class="services">
        <div class="container">
            <h2 class="section-title">Nos Services</h2>
            <div class="underline"></div>
            <div class="services-grid">
                <div class="service-item">
                    <div class="service-image"
                        style="height: 150px; overflow: hidden; border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="{{ asset('css/entretien.jpg') }}" alt="Entretien"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary-color);"><i
                            class="fas fa-tools"></i></div>
                    <h3>Entretien et Réparations</h3>
                    <p style="color: #6b7280; margin-top: 0.5rem;">Diagnostic complet et réparations mécaniques de
                        précision.</p>
                </div>
                <div class="service-item">
                    <div class="service-image"
                        style="height: 150px; overflow: hidden; border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="{{ asset('css/roue.jpeg') }}" alt="Carrosserie"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary-color);"><i
                            class="fas fa-car-crash"></i></div>
                    <h3>Carrosserie</h3>
                    <p style="color: #6b7280; margin-top: 0.5rem;">Remise à neuf, peinture et débosselage pour votre
                        véhicule.</p>
                </div>
                <div class="service-item">
                    <div class="service-image"
                        style="height: 150px; overflow: hidden; border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="{{ asset('css/pneu.png') }}" alt="Pneumatiques"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary-color);"><i
                            class="fas fa-truck-monster"></i></div>
                    <h3>Pneumatiques</h3>
                    <p style="color: #6b7280; margin-top: 0.5rem;">Vente, montage et équilibrage de pneus toutes marques.
                    </p>
                </div>
                <div class="service-item">
                    <div class="service-image"
                        style="height: 150px; overflow: hidden; border-radius: 0.5rem; margin-bottom: 1rem;">
                        <img src="{{ asset('css/controle.jpg') }}" alt="Contrôle Technique"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="font-size: 2rem; margin-bottom: 1rem; color: var(--primary-color);"><i
                            class="fas fa-clipboard-check"></i></div>
                    <h3>Contrôle Technique</h3>
                    <p style="color: #6b7280; margin-top: 0.5rem;">Préparation et passage au contrôle technique sans souci.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="container">
            <h2 class="section-title">Contactez-nous</h2>
            <div class="underline"></div>
            <div class="contact-content">
                <div class="contact-form">
                    <h3 style="margin-top: 0; margin-bottom: 1.5rem;">Envoyez-nous un message</h3>
                    <form action="" method="get">
                        <div style="margin-bottom: 1rem;">
                            <label for="name" class="form-label">Nom complet</label>
                            <input type="text" name="name" id="name" class="form-input" placeholder="Votre nom" required>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-input" placeholder="votre@email.com"
                                required>
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" rows="5" class="form-textarea"
                                placeholder="Comment pouvons-nous vous aider ?" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Envoyer le message</button>
                    </form>
                </div>
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63527.123456789!2d1.219512!3d6.137478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10235b2b2b2b2b2b%3A0x123456789abcdef!2sLom%C3%A9%2C%20Togo!5e0!3m2!1sen!2s!4v1234567890"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection