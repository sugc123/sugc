Public Class WebForm2
    Inherits System.Web.UI.Page
    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load

    End Sub

    Protected Sub btnLogin_Click(sender As Object, e As EventArgs) Handles btnLogin.Click
        If (txtUsername.Text = "admin") And txtPassword.Text = "admin" Then
            MsgBox("Valid Username and Password")
            Response.Redirect("Iteam.aspx")
        Else
            MsgBox("Not Valid Username and Password")
            Response.Redirect("Home.aspx")
        End If
    End Sub
End Class