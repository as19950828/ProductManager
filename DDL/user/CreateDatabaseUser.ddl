CREATE USER 'pm_user_dev'@'localhost' IDENTIFIED BY 'securepassword';
GRANT ALL PRIVILEGES ON product_manager.* TO 'pm_user_dev'@'localhost';