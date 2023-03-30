import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;

public class InventoryUI {
    private JFrame frame;
    private JTable productTable;
    private DefaultTableModel tableModel;
    private JButton addButton;
    private JButton editButton;
    private JButton deleteButton;

    public InventoryUI() {
        frame = new JFrame("Inventory Control System");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(800, 600);
        frame.setLayout(new BorderLayout());

        initComponents();
        addComponentsToFrame();

        frame.setVisible(true);
    }

    private void initComponents() {
        tableModel = new DefaultTableModel(new String[]{"ID", "Name", "Category", "Picture", "Description", "Stock"}, 0);
        productTable = new JTable(tableModel);

        addButton = new JButton("Add");
        editButton = new JButton("Edit");
        deleteButton = new JButton("Delete");

        addButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                // Show AddProductDialog when Add button is clicked and pass the tableModel
                AddProductDialog addProductDialog = new AddProductDialog(frame, tableModel);
            }
        });


        editButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                int selectedRow = productTable.getSelectedRow();
                if (selectedRow >= 0) {
                    // Retrieve product details from the selected row
                    String productName = (String) tableModel.getValueAt(selectedRow, 1);
                    String category = (String) tableModel.getValueAt(selectedRow, 2);
                    String picturePath = (String) tableModel.getValueAt(selectedRow, 3);
                    File picture = null;
                    if (picturePath != null && !picturePath.isEmpty()) {
                        picture = new File(picturePath);
                    }
                    String description = (String) tableModel.getValueAt(selectedRow, 4);
                    int stockLevel = (int) tableModel.getValueAt(selectedRow, 5);

                    // Show EditProductDialog with the selected product details
                    EditProductDialog editProductDialog = new EditProductDialog(frame, productName, category, picture, description, stockLevel);
                } else {
                    JOptionPane.showMessageDialog(frame, "Please select a product to edit.", "No product selected", JOptionPane.ERROR_MESSAGE);
                }
            }
        });




        deleteButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                // Delete product functionality here
                int selectedRow = productTable.getSelectedRow();
                if (selectedRow != -1) {
                    tableModel.removeRow(selectedRow);
                } else {
                    JOptionPane.showMessageDialog(frame, "Please select a row to delete.", "Error", JOptionPane.ERROR_MESSAGE);
                }
            }
        });
    }

    private void addComponentsToFrame() {
        JScrollPane scrollPane = new JScrollPane(productTable);
        frame.add(scrollPane, BorderLayout.CENTER);

        JPanel buttonPanel = new JPanel(new FlowLayout());
        buttonPanel.add(addButton);
        buttonPanel.add(editButton);
        buttonPanel.add(deleteButton);

        frame.add(buttonPanel, BorderLayout.SOUTH);
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(new Runnable() {
            @Override
            public void run() {
                new InventoryUI();
            }
        });
    }
}
