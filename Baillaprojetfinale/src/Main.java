import Services.*;
import Models.*;
import Views.*;

import java.util.*;

public class Main {
    public static void main(String[] args) {

        List<Inscription> inscriptions = new ArrayList<>();
        List<Classe> classes = new ArrayList<>();
        List<Etudiant> etudiants = new ArrayList<>();
        List<Demande> demandes = new ArrayList<>();


        ClasseService classeService = new ClasseService(classes);
        EtudiantService etudiantService = new EtudiantService(etudiants);
        InscriptionService inscriptionService = new InscriptionService(inscriptions);
        ModuleService moduleService = new ModuleService();
        ProfService profService = new ProfService();
        DemandeService demandeService = new DemandeService(demandes);
        StatistiqueService statistiqueService = new StatistiqueService(inscriptions, classes, etudiants, demandes);
        AnneeScolaireService anneeScolaireService = new AnneeScolaireService();
        EnseignementService enseignementService = new EnseignementService();


        MenuRp menuRp = new MenuRp(
                classeService,
                profService,
                moduleService,
                enseignementService,
                statistiqueService,
                anneeScolaireService
        );
        MenuAc menuAc = new MenuAc(
                inscriptionService,
                etudiantService,
                demandeService,
                classeService,
                inscriptions
        );


        Scanner sc = new Scanner(System.in);
        int choixRole;
        do {
            System.out.println("====== MENU CONNEXION ======");
            System.out.println("1. Responsable Pédagogique (RP)");
            System.out.println("2. Attaché de Classe (AC)");
            System.out.println("3. Étudiant");
            System.out.println("0. Quitter");
            System.out.print("Votre choix : ");
            choixRole = sc.nextInt();
            sc.nextLine();

            switch (choixRole) {
                case 1:
                    menuRp.afficher();
                    break;
                case 2:
                    menuAc.afficher();
                    break;
                case 3:
                    System.out.print("Entrez votre matricule : ");
                    String matricule = sc.nextLine();
                    MenuEtudiant menuEtudiant = new MenuEtudiant(demandeService, matricule);
                    menuEtudiant.afficher();
                    break;
                case 0:
                    System.out.println("Au revoir !");
                    break;
                default:
                    System.out.println("Choix invalide !");
            }
        } while (choixRole != 0);
    }
}
