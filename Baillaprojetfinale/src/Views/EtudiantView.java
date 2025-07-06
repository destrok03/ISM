package Views;

import Services.*;
import Models.*;
import java.util.*;

public class EtudiantView {
    private EtudiantService etudiantService;
    private ClasseService classeService;
    private List<Inscription> inscriptions;
    public EtudiantView(EtudiantService etudiantService, ClasseService classeService, List<Inscription> inscriptions) {
        this.etudiantService = etudiantService;
        this.classeService = classeService;
        this.inscriptions = inscriptions;
    }

    
    public void listerEtudiantsParClasseEtAnnee() {
        Scanner sc = new Scanner(System.in);
        System.out.print("ID de la classe : ");
        int idClasse = sc.nextInt();
        sc.nextLine();
        System.out.print("Année scolaire (ex: 2023-2024) : ");
        String annee = sc.nextLine();

        List<Etudiant> etudiants = etudiantService.listerEtudiantsParClasseEtAnnee(idClasse, annee, inscriptions);

        if (etudiants.isEmpty()) {
            System.out.println("Aucun étudiant trouvé pour cette classe et cette année.");
        } else {
            System.out.println("Liste des étudiants inscrits :");
            for (Etudiant e : etudiants) {
                System.out.println(e);
            }
        }
    }


}
