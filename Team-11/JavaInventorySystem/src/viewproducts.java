import java.awt.EventQueue;
import java.sql.*;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;

import java.awt.Font;
import javax.swing.JPanel;
import javax.swing.JTextField;
import javax.swing.JButton;
import javax.swing.JTable;
import javax.swing.JScrollPane;
import javax.swing.border.TitledBorder;
import javax.swing.table.DefaultTableModel;
import javax.swing.table.TableModel;

import com.mysql.cj.jdbc.result.ResultSetMetaData;

import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.awt.Color;
import javax.swing.JTextArea;


public class viewproducts {

	JFrame frame;
	private JTextField txtname;
	private JTextField txtcategory;
	private JTable table;
	private JTextField txtid;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					viewproducts window = new viewproducts();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public viewproducts() {
		initialize();
		Connect();
		table_load();

	}

	Connection con;
	PreparedStatement pst;
	ResultSet rs;
	private JTextField txtquantity;
	private JTextField txtprice;
	private JTextField txtimage;
	private JTextField txtimage1;
	private JTextField txtimage2;

	// connects to mysql database
	public void Connect() {
		try {
			Class.forName("com.mysql.jdbc.Driver");
			con = DriverManager.getConnection("jdbc:mysql://localhost:3306/sc", "root", "");
		} catch (ClassNotFoundException ex) {
			ex.printStackTrace();
		} catch (SQLException ex) {
			ex.printStackTrace();
		}

	}

	// loads table of products
	public void table_load() {
		try {
			pst = con.prepareStatement("select * from products");
			rs = pst.executeQuery();
			ResultSetMetaData rsmd = (ResultSetMetaData) rs.getMetaData();
			DefaultTableModel model = (DefaultTableModel) table.getModel();

			int cols = rsmd.getColumnCount();
			String[] colName = new String[cols];
			for (int i = 0; i < cols; i++) {
				colName[i] = rsmd.getColumnName(i + 1);

			}
			model.setColumnIdentifiers(colName);
			while (rs.next()) {
				String id = rs.getString(1);
				String name = rs.getString(2);
				String description = rs.getString(3);
				String category = rs.getString(4);
				String quantity = rs.getString(5);
				String price = rs.getString(6);
				String image = rs.getString(7);
				String image1 = rs.getString(8);
				String image2 = rs.getString(9);
				String[] row = { id, name, description, category, quantity, price, image, image1, image2 };
				model.addRow(row);

			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize() {
		frame = new JFrame();
		frame.getContentPane().setBackground(new Color(228, 233, 233));
		frame.setBounds(100, 100, 1411, 775);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);

		JLabel lblNewLabel = new JLabel("Products");
		lblNewLabel.setFont(new Font("Yu Gothic UI Semibold", Font.PLAIN, 30));
		lblNewLabel.setBounds(600, 10, 142, 31);
		frame.getContentPane().add(lblNewLabel);

		JPanel panel = new JPanel();
		panel.setBackground(new Color(159, 217, 223));
		panel.setBorder(new TitledBorder(null, "Products", TitledBorder.LEADING, TitledBorder.TOP, null, null));
		panel.setBounds(10, 63, 371, 586);
		frame.getContentPane().add(panel);
		panel.setLayout(null);

		JLabel lblNewLabel_1 = new JLabel("Product name");
		lblNewLabel_1.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_1.setBounds(10, 22, 141, 26);
		panel.add(lblNewLabel_1);

		JLabel lblNewLabel_2 = new JLabel("Description");
		lblNewLabel_2.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_2.setBounds(10, 103, 136, 33);
		panel.add(lblNewLabel_2);

		JLabel lblNewLabel_3 = new JLabel("Quantity");
		lblNewLabel_3.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_3.setBounds(10, 324, 88, 26);
		panel.add(lblNewLabel_3);

		txtname = new JTextField();
		txtname.setBounds(10, 44, 351, 49);
		panel.add(txtname);
		txtname.setColumns(10);

		txtcategory = new JTextField();
		txtcategory.setBounds(104, 270, 88, 30);
		panel.add(txtcategory);
		txtcategory.setColumns(10);

		txtquantity = new JTextField();
		txtquantity.setColumns(10);
		txtquantity.setBounds(104, 319, 88, 31);
		panel.add(txtquantity);

		txtprice = new JTextField();
		txtprice.setColumns(10);
		txtprice.setBounds(104, 368, 87, 33);
		panel.add(txtprice);

		txtimage = new JTextField();
		txtimage.setColumns(10);
		txtimage.setBounds(90, 420, 271, 26);
		panel.add(txtimage);

		txtimage1 = new JTextField();
		txtimage1.setColumns(10);
		txtimage1.setBounds(90, 461, 271, 26);
		panel.add(txtimage1);

		txtimage2 = new JTextField();
		txtimage2.setColumns(10);
		txtimage2.setBounds(90, 502, 271, 26);
		panel.add(txtimage2);

		JLabel lblNewLabel_2_1 = new JLabel("Category");
		lblNewLabel_2_1.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_2_1.setBounds(10, 281, 102, 33);
		panel.add(lblNewLabel_2_1);

		JLabel lblNewLabel_2_2 = new JLabel("Price");
		lblNewLabel_2_2.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_2_2.setBounds(10, 373, 83, 26);
		panel.add(lblNewLabel_2_2);

		JLabel lblNewLabel_2_3 = new JLabel("Image");
		lblNewLabel_2_3.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_2_3.setBounds(10, 425, 83, 26);
		panel.add(lblNewLabel_2_3);

		JLabel lblNewLabel_2_4 = new JLabel("Image1");
		lblNewLabel_2_4.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_2_4.setBounds(10, 466, 83, 26);
		panel.add(lblNewLabel_2_4);

		JLabel lblNewLabel_2_5 = new JLabel("Image2");
		lblNewLabel_2_5.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_2_5.setBounds(10, 507, 83, 26);
		panel.add(lblNewLabel_2_5);

		JButton btnNewButton = new JButton("Add");
		btnNewButton.setBackground(new Color(55, 156, 168));
		btnNewButton.setFont(new Font("Yu Gothic UI Semibold", Font.PLAIN, 25));
		btnNewButton.setBounds(278, 543, 83, 33);
		panel.add(btnNewButton);
		
		JTextArea txtdescription = new JTextArea();
		txtdescription.setBounds(10, 127, 351, 133);
		panel.add(txtdescription);
		btnNewButton.addActionListener(new ActionListener() {
			// adds product into database
			public void actionPerformed(ActionEvent e) {

				String name = txtname.getText();
				String description = txtdescription.getText();
				String category = txtcategory.getText();
				String quantity = txtquantity.getText();
				String price = txtcategory.getText();
				String image = txtname.getText();
				String image1 = txtimage1.getText();
				String image2 = txtimage2.getText();

				try {
					pst = con.prepareStatement(
							"insert into products(name,description,category,quantity, price, image, image1, image2)values(?,?,?,?,?,?,?,?)");
					pst.setString(1, name);
					pst.setString(2, description);
					pst.setString(3, category);
					pst.setString(4, quantity);
					pst.setString(5, price);
					pst.setString(6, image);
					pst.setString(7, image1);
					pst.setString(8, image2);
					pst.executeUpdate();
					JOptionPane.showMessageDialog(null, "Product Added");

					DefaultTableModel tableModel = (DefaultTableModel) table.getModel();
					tableModel.setRowCount(0);
					table_load();

					txtname.setText("");
					txtdescription.setText("");
					txtcategory.setText("");
					txtquantity.setText("");
					txtprice.setText("");
					txtimage.setText("");
					txtimage1.setText("");
					txtimage2.setText("");
					txtname.requestFocus();
				} catch (SQLException e1) {
					e1.printStackTrace();
				}
			}
		});

		JScrollPane scrollPane = new JScrollPane();
		scrollPane.setBounds(391, 61, 996, 667);
		frame.getContentPane().add(scrollPane);

		table = new JTable();
		scrollPane.setViewportView(table);

		JPanel panel_1 = new JPanel();
		panel_1.setBorder(new TitledBorder(null, "Search", TitledBorder.LEADING, TitledBorder.TOP, null, null));
		panel_1.setBounds(20, 663, 361, 65);
		frame.getContentPane().add(panel_1);
		panel_1.setLayout(null);

		JLabel lblNewLabel_4 = new JLabel("Product ID");
		lblNewLabel_4.setFont(new Font("Yu Gothic Medium", Font.PLAIN, 20));
		lblNewLabel_4.setBounds(10, 22, 115, 33);
		panel_1.add(lblNewLabel_4);

		txtid = new JTextField();
		txtid.addKeyListener(new KeyAdapter() {
			// searches products by inputed id
			public void keyReleased(KeyEvent e) {
				try {
					String id = txtid.getText();
					pst = con.prepareStatement("select * from products where id = ?");
					pst.setString(1, id);
					ResultSet rs = pst.executeQuery();

					if (rs.next() == true) {

						String name = rs.getString(2);
						String description = rs.getString(3);
						String category = rs.getString(4);
						String quantity = rs.getString(5);
						String price = rs.getString(6);
						String image = rs.getString(7);
						String image1 = rs.getString(8);
						String image2 = rs.getString(9);

						txtname.setText(name);
						txtdescription.setText(description);
						txtcategory.setText(category);
						txtquantity.setText(quantity);
						txtprice.setText(price);
						txtimage.setText(image);
						txtimage1.setText(image1);
						txtimage2.setText(image2);

					} else {
						txtname.setText("");
						txtdescription.setText("");
						txtcategory.setText("");
						txtquantity.setText("");
						txtprice.setText("");
						txtimage.setText("");
						txtimage1.setText("");
						txtimage2.setText("");

					}

				} catch (SQLException ex) {

				}
			}

		});
		txtid.setColumns(10);
		txtid.setBounds(131, 20, 145, 24);
		panel_1.add(txtid);
	}
}
