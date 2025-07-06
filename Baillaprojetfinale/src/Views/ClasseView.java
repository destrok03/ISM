package Views;
import Services.ClasseService;
import Models.Classe;
import Models.Niveau;
import java.util.*;
public class ClasseView {
    private ClasseService classeService;

    public ClasseView(ClasseService classeService) {
        this.classeService = classeService;
    }

    public void menu() {
        List<String> options = Arrays.asList(
                "Ajouter une classe",
                "Lister les classes",
                "Retour"
        );
        int choix;
        do {
            choix = MenuUtils.afficherMenu("GESTION DES CLASSES", options);
            switch (choix) {
                case 1:
                    Scanner sc = new Scanner(System.in);
                    System.out.print("Libellé : ");
                    String libelle = sc.nextLine();
                    System.out.print("Filière : ");
                    String filiere = sc.nextLine();
                    System.out.print("Niveau (L1/L2/L3/M1/M2) : ");
                    Niveau niveau = Niveau.valueOf(sc.nextLine().toUpperCase());
                    Classe c = new Classe(libelle, filiere, niveau);
                    classeService.ajouterClasse(c);
                    System.out.println("Classe ajoutée avec ID : " + c.getIdClasse());
                    break;
                case 2:
                    for (Classe cl : classeService.listerClasses()) {
                        System.out.println(cl.getIdClasse() + " | " + cl.getLibelle() + " | " + cl.getFiliere() + " | " + cl.getNiveau());
                    }
                    break;
            }
        } while (choix != 3); 
    }
}
