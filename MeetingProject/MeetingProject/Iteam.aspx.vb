Imports System.Data
Imports System.Data.SqlClient
Public Class WebForm3
    Inherits System.Web.UI.Page
    Dim con As New SqlConnection
    Dim cmd As New SqlCommand
    Dim constr As String = "Data Source=(LocalDB)\v11.0;AttachDbFilename=D:\VB.NET\MeetingProject\MeetingProject\App_Data\Shope.mdf;Integrated Security=True"
    Dim cmdstr As String
    Dim adp As New SqlDataAdapter
    Dim ds As New DataSet
    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        fillgrid()
    End Sub

    Protected Sub btnInsert_Click(sender As Object, e As EventArgs) Handles btnInsert.Click
        Try
            con = New SqlConnection(constr)
            con.Open()
            cmdstr = "insert into iteam values (" & txtid.Text & ",'" & txtname.Text & "','" & txtquantity.Text & "','" & Calendar1.SelectedDate & "','" & DropDownList1.SelectedItem.Text & "')"
            cmd = New SqlCommand(cmdstr, con)
            cmd.ExecuteNonQuery()
            con.Close()
            fillgrid()
            MsgBox("Record Inserted Successfully")
        Catch ex As Exception
            MsgBox(ex.Message.ToString())
        End Try
    End Sub
    Sub fillgrid()
        Try
            con = New SqlConnection(constr)
            con.Open()
            cmdstr = "select * from iteam"
            cmd = New SqlCommand(cmdstr, con)
            adp = New SqlDataAdapter(cmd)
            ds = New DataSet
            adp.Fill(ds, "iteam")
            GridView1.DataSource = ds.Tables("iteam")
            GridView1.DataBind()
        Catch ex As Exception
            MsgBox(ex.Message.ToString())
        End Try
    End Sub

    Protected Sub btnUpdate_Click(sender As Object, e As EventArgs) Handles btnUpdate.Click
        Try
            con = New SqlConnection(constr)
            con.Open()
            cmdstr = "update iteam set name='" & txtname.Text & "',quantity='" & txtquantity.Text & "',mfd='" & Calendar1.SelectedDate & "',gifttype='" & DropDownList1.SelectedItem.Text & "'where id='" & txtid.Text & "'"
            cmd = New SqlCommand(cmdstr, con)
            cmd.ExecuteNonQuery()
            con.Close()
            fillgrid()
            MsgBox("Record Updated Successfully")
        Catch ex As Exception
            MsgBox(ex.Message.ToString())
        End Try
    End Sub

    Protected Sub btnDelete_Click(sender As Object, e As EventArgs) Handles btnDelete.Click
        Try
            con = New SqlConnection(constr)
            con.Open()
            cmdstr = "delete iteam where id='" & txtid.Text & "'"
            cmd = New SqlCommand(cmdstr, con)
            cmd.ExecuteNonQuery()
            con.Close()
            fillgrid()
            MsgBox("Record Deleted Successfully")
        Catch ex As Exception
            MsgBox(ex.Message.ToString())
        End Try
    End Sub
End Class