package Views;

import Services.*;
import Models.*;
import java.util.*;

public class InscriptionView {
    private InscriptionService inscriptionService;
    private EtudiantService etudiantService;
    private ClasseService classeService;
    private List<Inscription> inscriptions;

    public InscriptionView(
            InscriptionService inscriptionService,
            EtudiantService etudiantService,
            ClasseService classeService,
            List<Inscription> inscriptions
    ) {
        this.inscriptionService = inscriptionService;
        this.etudiantService = etudiantService;
        this.classeService = classeService;
        this.inscriptions = inscriptions;
    }

    public void menu() {
        List<String> options = Arrays.asList(
                "Inscrire un étudiant",
                "Lister les inscriptions",
                "Retour"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("GESTION DES INSCRIPTIONS", options);
            switch (choix) {
                case 1:
                    inscrireEtudiant();
                    break;
                case 2:
                    afficherToutesLesInscriptions();
                    break;
            }
        } while (choix != 3);
    }

    private void inscrireEtudiant() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Matricule étudiant : ");
        String matricule = sc.nextLine();
        System.out.print("ID classe : ");
        int idClasse = sc.nextInt();
        sc.nextLine();
        System.out.print("Année scolaire : ");
        String annee = sc.nextLine();
        System.out.println("Etudiant inscrit !");
    }

    private void afficherToutesLesInscriptions() {
        for (Inscription ins : inscriptionService.listerInscriptions()) {
            System.out.println(ins);
        }
    }
}
