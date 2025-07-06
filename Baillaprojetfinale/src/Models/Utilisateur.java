package Models;

public class Utilisateur extends Personne {
    private String login;
    private String motDePasse;


    public Utilisateur(String nomComplet, String adresse, String login, String motDePasse, TypeRole role,Genre sexe) {
        super(nomComplet, adresse, role,sexe);
        this.login = login;
        this.motDePasse = motDePasse;
    }

    // Getters et setters inchangés...
    public String getLogin() { return login; }
    public void setLogin(String login) { this.login = login; }
    public String getMotDePasse() { return motDePasse; }
    public void setMotDePasse(String motDePasse) { this.motDePasse = motDePasse; }

    @Override
    public String toString() {
        return "Utilisateur{" +
                "login='" + login + '\'' +
                ", motDePasse='" + motDePasse + '\'' +
                ", id=" + getId() +
                ", nomComplet='" + getNomComplet() + '\'' +
                ", adresse='" + getAdresse() + '\'' +
                ", role=" + getRole() +
                '}';
    }

    public static class Classe {
        private static int compteur = 0;
        private final int idClasse;
        private String libelle;
        private String filiere;
        private Niveau niveau; // Enumération

        public Classe(String libelle, String filiere, Niveau niveau) {
            this.idClasse = ++compteur;
            this.libelle = libelle;
            this.filiere = filiere;
            this.niveau = niveau;
        }

        public int getIdClasse() { return idClasse; }
        public String getLibelle() { return libelle; }
        public void setLibelle(String libelle) { this.libelle = libelle; }
        public String getFiliere() { return filiere; }
        public void setFiliere(String filiere) { this.filiere = filiere; }
        public Niveau getNiveau() { return niveau; }
        public void setNiveau(Niveau niveau) { this.niveau = niveau; }

        @Override
        public String toString() {
            return "Classe{" +
                    "idClasse=" + idClasse +
                    ", libelle='" + libelle + '\'' +
                    ", filiere='" + filiere + '\'' +
                    ", niveau=" + niveau +
                    '}';
        }
    }
}
