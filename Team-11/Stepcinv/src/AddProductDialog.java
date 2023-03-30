import javax.swing.*;
import javax.swing.filechooser.FileNameExtensionFilter;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;

public class AddProductDialog extends JDialog {
    private JTextField nameField;
    private JComboBox<String> categoryField;
    private JTextArea descriptionField;
    private JScrollPane descriptionScrollPane;
    private JSpinner stockLevelField;
    private JButton saveButton;
    private JButton cancelButton;
    private JButton uploadPictureButton;
    private JLabel picturePathLabel;
    private File pictureFile;
    private DefaultTableModel tableModel;

    public AddProductDialog(Frame owner, DefaultTableModel tableModel) {
        super(owner, "Add Product", true);
        this.tableModel = tableModel;
        setSize(500, 800);
        setLayout(new GridBagLayout());
        GridBagConstraints constraints = new GridBagConstraints();
        constraints.anchor = GridBagConstraints.WEST;
        constraints.insets = new Insets(10, 10, 10, 10);

        initComponents();
        addComponents(constraints);

        setDefaultCloseOperation(JDialog.DISPOSE_ON_CLOSE);
        setLocationRelativeTo(owner);
        setVisible(true);
    }

    private void initComponents() {
        nameField = new JTextField(20);
        categoryField = new JComboBox<>(new String[]{"Category 1", "Category 2", "Category 3"});
        descriptionField = new JTextArea(5, 20);
        descriptionScrollPane = new JScrollPane(descriptionField);
        stockLevelField = new JSpinner(new SpinnerNumberModel(1, 1, 10000, 1));
        saveButton = new JButton("Save");
        cancelButton = new JButton("Cancel");
        uploadPictureButton = new JButton("Upload Picture");
        picturePathLabel = new JLabel();

        saveButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                int id = (int) (Math.random() * 100000); // Generate a random ID value
                String productName = nameField.getText();
                String category = (String) categoryField.getSelectedItem();
                String picturePath = pictureFile != null ? pictureFile.getAbsolutePath() : "";
                String description = descriptionField.getText();
                int stockLevel = (int) stockLevelField.getValue();

                Object[] product = new Object[]{id, productName, category, picturePath, description, stockLevel};
                tableModel.addRow(product);

                dispose();
            }
        });


        cancelButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                dispose();
            }
        });

        uploadPictureButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                JFileChooser fileChooser = new JFileChooser();
                FileNameExtensionFilter filter = new FileNameExtensionFilter("Images", "jpg", "png", "jpeg", "bmp", "gif");
                fileChooser.setFileFilter(filter);
                int result = fileChooser.showOpenDialog(AddProductDialog.this);
                if (result == JFileChooser.APPROVE_OPTION) {
                    pictureFile = fileChooser.getSelectedFile();
                    picturePathLabel.setText(pictureFile.getAbsolutePath());
                }
            }
        });
    }

    private void addComponents(GridBagConstraints constraints) {
        constraints.gridx = 0;
        constraints.gridy = 0;
        add(new JLabel("Product Name:"), constraints);
        constraints.gridx = 1;
        add(nameField, constraints);
        constraints.gridy++;

        constraints.gridx = 0;
        add(new JLabel("Category:"), constraints);
        constraints.gridx = 1;
        add(categoryField, constraints);
        constraints.gridy++;

        constraints.gridx = 0;
        add(new JLabel("Description:"), constraints);
        constraints.gridx = 1;
        add(descriptionScrollPane, constraints);
        constraints.gridy++;

        constraints.gridx = 0;
        add(new JLabel("Stock Level:"), constraints);
        constraints.gridx = 1;
        add(stockLevelField, constraints);
        constraints.gridy++;

        constraints.gridx = 0;
        add(new JLabel("Picture:"), constraints);
        constraints.gridx = 1;
        add(uploadPictureButton, constraints);
        constraints.gridy++;

        constraints.gridx = 0;
        add(new JLabel("Picture Path:"), constraints);
        constraints.gridx = 1;
        add(picturePathLabel, constraints);
        constraints.gridy++;

        constraints.gridx = 0;
        constraints.gridwidth = 2;
        constraints.anchor = GridBagConstraints.CENTER;
        JPanel buttonPanel = new JPanel();
        buttonPanel.add(saveButton);
        buttonPanel.add(cancelButton);
        add(buttonPanel, constraints);
    }
}
