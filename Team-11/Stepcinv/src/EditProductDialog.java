import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;

public class EditProductDialog extends JDialog {
    private JTextField nameField;
    private JComboBox<String> categoryField;
    private JButton uploadPictureButton;
    private JTextArea descriptionField;
    private JSpinner stockLevelField;
    private JButton saveButton;
    private JButton cancelButton;
    private JLabel picturePathLabel;

    private File pictureFile;

    public EditProductDialog(Frame owner, String productName, String category, File picture, String description, int stockLevel) {
        super(owner, "Edit Product", true);
        setLayout(new GridBagLayout());
        setSize(400, 300);
        setLocationRelativeTo(owner);

        initComponents(productName, category, picture, description, stockLevel);
        addComponentsToDialog();

        setVisible(true);
    }

    private void initComponents(String productName, String category, File picture, String description, int stockLevel) {
        nameField = new JTextField(productName, 20);
        categoryField = new JComboBox<>(new String[]{"Category 1", "Category 2", "Category 3"});
        categoryField.setSelectedItem(category);
        uploadPictureButton = new JButton("Upload Picture");
        descriptionField = new JTextArea(description, 5, 20);
        stockLevelField = new JSpinner(new SpinnerNumberModel(stockLevel, 1, Integer.MAX_VALUE, 1));
        saveButton = new JButton("Save");
        cancelButton = new JButton("Cancel");
        picturePathLabel = new JLabel();

        if (picture != null) {
            pictureFile = picture;
            picturePathLabel.setText(pictureFile.getAbsolutePath());
        }

        uploadPictureButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                JFileChooser fileChooser = new JFileChooser();
                int returnValue = fileChooser.showOpenDialog(EditProductDialog.this);
                if (returnValue == JFileChooser.APPROVE_OPTION) {
                    pictureFile = fileChooser.getSelectedFile();
                    picturePathLabel.setText(pictureFile.getAbsolutePath());
                }
            }
        });

        saveButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                // Update product functionality here
                dispose();
            }
        });

        cancelButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                dispose();
            }
        });
    }

    private void addComponentsToDialog() {
        GridBagConstraints constraints = new GridBagConstraints();
        constraints.gridx = 0;
        constraints.gridy = 0;
        constraints.anchor = GridBagConstraints.WEST;
        constraints.insets = new Insets(5, 5, 5, 5);

        add(new JLabel("Name:"), constraints);
        constraints.gridy++;
        add(new JLabel("Category:"), constraints);
        constraints.gridy++;
        add(new JLabel("Picture:"), constraints);
        constraints.gridy++;
        add(new JLabel("Description:"), constraints);
        constraints.gridy++;
        add(new JLabel("Stock Level:"), constraints);

        constraints.gridy++;
        constraints.fill = GridBagConstraints.HORIZONTAL;
        add(stockLevelField, constraints);
        constraints.gridy++;

        constraints.gridx = 0;
        constraints.gridwidth = 2;
        constraints.fill = GridBagConstraints.NONE;
        constraints.anchor = GridBagConstraints.CENTER;
        JPanel buttonPanel = new JPanel(new FlowLayout(FlowLayout.RIGHT));
        buttonPanel.add(saveButton);
        buttonPanel.add(cancelButton);
        add(buttonPanel, constraints);

        constraints.gridy++;
        constraints.anchor = GridBagConstraints.WEST;
        add(picturePathLabel, constraints);
    }
}