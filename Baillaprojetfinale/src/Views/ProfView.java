package Views;

import Services.ProfService;
import Models.Prof;
import Models.Genre;
import java.util.*;

public class ProfView {
    private ProfService profService;

    public ProfView(ProfService profService) {
        this.profService = profService;
    }

    public void menu() {
        List<String> options = Arrays.asList(
                "Ajouter un professeur",
                "Lister les professeurs",
                "Retour"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("GESTION DES PROFESSEURS", options);
            switch (choix) {
                case 1:
                    Scanner sc = new Scanner(System.in);
                    System.out.print("Nom complet : ");
                    String nom = sc.nextLine();
                    System.out.print("Adresse : ");
                    String adresse = sc.nextLine();
                    System.out.print("Grade : ");
                    String grade = sc.nextLine();
                    System.out.print("Sexe (HOMME/FEMME) : ");
                    String sexeStr = sc.nextLine().toUpperCase();
                    Genre sexe;
                    try {
                        sexe = Genre.valueOf(sexeStr);
                    } catch (IllegalArgumentException e) {
                        System.out.println("Sexe invalide ! Par défaut : HOMME");
                        sexe = Genre.HOMME;
                    }
                    Prof p = new Prof(nom, adresse, grade, sexe);
                    profService.ajouterProf(p);
                    System.out.println("Professeur ajouté avec ID : " + p.getId());
                    break;
                case 2:
                    for (Prof pr : profService.listerProfs()) {
                        System.out.println(pr);
                    }
                    break;
            }
        } while (choix != 3);
    }
}
