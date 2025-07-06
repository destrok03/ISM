package Models;

public class Prof extends Personne {
    private String grade;

    // Constructeur qui appelle le constructeur du parent
    public Prof(String nomComplet, String adresse, String grade,Genre sexe) {
        super(nomComplet, adresse, TypeRole.PROF,sexe); // ou ton enum
        this.grade = grade;
    }

    public String getGrade() { return grade; }
    public void setGrade(String grade) { this.grade = grade; }

    @Override
    public String toString() {
        return "Prof{" +
                "sexe=" + sexe +
                ", role=" + role +
                ", adresse='" + adresse + '\'' +
                ", nomComplet='" + nomComplet + '\'' +
                ", grade='" + grade + '\'' +
                '}';
    }
}
