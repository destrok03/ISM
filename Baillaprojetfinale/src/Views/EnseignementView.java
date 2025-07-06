package Views;

import Services.EnseignementService;
import Models.Enseignement;
import java.util.*;

public class EnseignementView {
    private EnseignementService enseignementService;

    public EnseignementView(EnseignementService enseignementService) {
        this.enseignementService = enseignementService;
    }

    public void menu() {
        List<String> options = Arrays.asList(
                "Affecter un module à un professeur",
                "Lister toutes les affectations",
                "Lister les affectations par professeur",
                "Lister les affectations par classe",
                "Lister les affectations par module",
                "Retour"
        );
        int choix;
        Scanner sc = new Scanner(System.in);

        do {
            choix = MenuUtils.afficherMenu("GESTION DES AFFECTATIONS (Enseignements)", options);
            switch (choix) {
                case 1:
                    System.out.print("ID Professeur : ");
                    int idProf = sc.nextInt();
                    System.out.print("ID Classe : ");
                    int idClasse = sc.nextInt();
                    System.out.print("ID Module : ");
                    int idModule = sc.nextInt();
                    sc.nextLine(); 
                    Enseignement e = new Enseignement(idProf, idClasse, idModule);
                    enseignementService.ajouterEnseignement(e);
                    System.out.println("Affectation enregistrée (ID = " + e.getIdEnseignement() + ")");
                    break;

                case 2:
                    System.out.println("--- Toutes les affectations ---");
                    for (Enseignement ens : enseignementService.listerEnseignements()) {
                        System.out.println(ens);
                    }
                    break;

                case 3:
                    System.out.print("ID Professeur : ");
                    int idProfFiltre = sc.nextInt();
                    sc.nextLine();
                    List<Enseignement> parProf = enseignementService.listerParProf(idProfFiltre);
                    if (parProf.isEmpty()) System.out.println("Aucune affectation pour ce prof.");
                    else parProf.forEach(System.out::println);
                    break;

                case 4:
                    System.out.print("ID Classe : ");
                    int idClasseFiltre = sc.nextInt();
                    sc.nextLine();
                    List<Enseignement> parClasse = enseignementService.listerParClasse(idClasseFiltre);
                    if (parClasse.isEmpty()) System.out.println("Aucune affectation pour cette classe.");
                    else parClasse.forEach(System.out::println);
                    break;

                case 5:
                    System.out.print("ID Module : ");
                    int idModuleFiltre = sc.nextInt();
                    sc.nextLine();
                    List<Enseignement> parModule = enseignementService.listerParModule(idModuleFiltre);
                    if (parModule.isEmpty()) System.out.println("Aucune affectation pour ce module.");
                    else parModule.forEach(System.out::println);
                    break;

                case 6:
                    System.out.println("Retour au menu précédent.");
                    break;
            }
        } while (choix != 6);
    }
}



