package Views;

import Services.*;
import java.util.*;

public class MenuAc {
    private InscriptionView inscriptionView;
    private EtudiantView etudiantView;
    private DemandeView demandeView;

    public MenuAc(
            InscriptionService inscriptionService,
            EtudiantService etudiantService,
            DemandeService demandeService,
            ClasseService classeService,
            List<Models.Inscription> inscriptions
    ) {
        this.inscriptionView = new InscriptionView(inscriptionService, etudiantService, classeService, inscriptions);
        this.etudiantView = new EtudiantView(etudiantService, classeService, inscriptions);
        this.demandeView = new DemandeView(demandeService);
    }

    public void afficher() {
        List<String> options = Arrays.asList(
                "Inscrire ou réinscrire un étudiant",
                "Lister les étudiants d'une classe et année",
                "Rechercher les demandes d'un étudiant",
                "Déconnexion"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("MENU ATTACHÉ DE CLASSE", options);
            switch (choix) {
                case 1:
                    inscriptionView.menu();
                    break;
                case 2:
                    etudiantView.listerEtudiantsParClasseEtAnnee();
                    break;
                case 3:
                    demandeView.listerDemandesParMatricule();
                    break;
                case 4:
                    System.out.println("Déconnexion...");
                    break;
            }
        } while (choix != 4);
    }
}
