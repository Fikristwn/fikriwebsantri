public import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class ada extends JFrame {
    private JTextField textField;
    private JButton saveButton;

    public ada() {
        super("Aplikasi Database");

        textField = new JTextField(20);
        saveButton = new JButton("Simpan");

        saveButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                saveData();
            }
        });

        setLayout(new FlowLayout());
        add(textField);
        add(saveButton);

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        pack();
        setLocationRelativeTo(null);
        setVisible(true);
    }

    private void saveData() {
        try {
            Connection connection = DatabaseConnection.connect();
            String sql = "INSERT INTO nama_tabel (kolom_data) VALUES (?)";
            PreparedStatement preparedStatement = connection.prepareStatement(sql);
            preparedStatement.setString(1, textField.getText());
            preparedStatement.executeUpdate();

            JOptionPane.showMessageDialog(this, "Data berhasil disimpan.");
            connection.close();
        } catch (SQLException ex) {
            ex.printStackTrace();
            JOptionPane.showMessageDialog(this, "Error: " + ex.getMessage());
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            @Override
            public void run() {
                new MainForm();
            }
        });
    }
}
 ada {
    
}
