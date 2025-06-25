CREATE DATABASE CasinoEmulator;
GO

USE CasinoEmulator;
GO

-- ������� �������������
CREATE TABLE Users (
    UserID INT IDENTITY(1,1) PRIMARY KEY,
    Username NVARCHAR(50) NOT NULL UNIQUE,
    PasswordHash NVARCHAR(255) NOT NULL,
    Email NVARCHAR(100) NOT NULL UNIQUE,
    Balance DECIMAL(18, 2) NOT NULL DEFAULT 0.00,
    CreatedAt DATETIME2 DEFAULT SYSUTCDATETIME()
);

INSERT INTO Users (Username, PasswordHash, Email, Balance)
VALUES ('player1', 'hashed_password_here', 'player1@example.com', 1000.00);
GO

UPDATE Users
SET Balance = Balance - 50.00 + 150.00
WHERE UserID = 1;
GO
-- ���������� ������� ����� ��������� (������ = ������ - ������)
UPDATE Users
SET Balance = Balance - 50.00
WHERE UserID = 1;
GO