import java.sql.*;

public class InventorySystem {

    private Connection conn;

    public InventorySystem() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost/SC","root","");
        } catch (ClassNotFoundException | SQLException e) {
            e.printStackTrace();
        }
    }


    // Adds items to inventory
    public void addItem(String item, int quantity) {
        try {
            PreparedStatement stmt = conn.prepareStatement("INSERT INTO inventory (item, quantity) VALUES (?, ?) ON DUPLICATE KEY UPDATE quantity=quantity+?");
            stmt.setString(1, item);
            stmt.setInt(2, quantity);
            stmt.setInt(3, quantity);
            stmt.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // removes items from inventory
    public void removeItem(String item, int quantity) {
        try {
            PreparedStatement stmt = conn.prepareStatement("UPDATE inventory SET quantity=quantity-? WHERE item=? AND quantity>=?");
            stmt.setInt(1, quantity);
            stmt.setString(2, item);
            stmt.setInt(3, quantity);
            int rowsUpdated = stmt.executeUpdate();
            if (rowsUpdated == 0) {
                System.out.println("Error: Not enough " + item + " in inventory.");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // check inventory
    public int checkInventory(String item) {
        try {
            PreparedStatement stmt = conn.prepareStatement("SELECT quantity FROM inventory WHERE item=?");
            stmt.setString(1, item);
            ResultSet rs = stmt.executeQuery();
            if (rs.next()) {
                return rs.getInt("quantity");
            } else {
                System.out.println("Error: " + item + " not found in inventory.");
                return -1;
            }
        } catch (SQLException e) {
            e.printStackTrace();
            return -1;
        }
    }

    // alerts user if inventory goes to 0
    public void inventoryAlert(String item, int threshold) {
        int currentQuantity = checkInventory(item);
        if (currentQuantity == -1) {
            System.out.println("Error: Cannot perform inventory alert.");
        } else if (currentQuantity < threshold) {
            System.out.println("Alert: " + item + " inventory is below threshold of " + threshold + ".");
        }
    }

    // adds incoming orders
    public void addIncomingOrder(String item, int quantity) {
        try {
            PreparedStatement stmt = conn.prepareStatement("INSERT INTO incoming_orders (item, quantity) VALUES (?, ?)");
            stmt.setString(1, item);
            stmt.setInt(2, quantity);
            stmt.executeUpdate();
            addItem(item, quantity);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // adds outgoing orders
    public void addOutgoingOrder(String item, int quantity) {
        try {
            PreparedStatement stmt = conn.prepareStatement("INSERT INTO outgoing_orders (item, quantity) VALUES (?, ?)");
            stmt.setString(1, item);
            stmt.setInt(2, quantity);
            stmt.executeUpdate();
            removeItem(item, quantity);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    // inventory report for the admins
    public void generateReport() {
        try {
            PreparedStatement stmt = conn.prepareStatement("SELECT * FROM inventory");
            ResultSet rs = stmt.executeQuery();
            System.out.println("Current Inventory Report:");
            System.out.println("-------------------------");
            while (rs.next()) {
                String item = rs.getString("item");
                int quantity = rs.getInt("quantity");
                double price = rs.getDouble("price");
                String description = rs.getString("description");
                System.out.println(item + ": " + quantity + " available, price: £" + price + ", description: " + description);
            }
            rs.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
      

}
