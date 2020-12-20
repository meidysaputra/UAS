from kivy.app import App
from kivymd.app import MDApp

from kivy.properties import ObjectProperty
from kivy.lang import Builder

import urllib.request, json

from kivy.uix.widget import Widget
from kivy.uix.screenmanager import ScreenManager, Screen

from kivy.uix.boxlayout import BoxLayout
from kivymd.uix.boxlayout import MDBoxLayout
from kivy.core.window import Window
Window.size = (450,500)

def cekLogin(username, password):
    with urllib.request.urlopen("http://localhost/Perpustakaan/api.php?auth=888&perintah=login&username="+username+"&password="+password) as json_url:
        data = json.loads(json_url.read())
        usernameTabel = data[0]["username"]
        passwordTabel = data[0]["password"]


        #root.manager.current = 'Beranda'
        if username==usernameTabel and password==passwordTabel:
            #print("Login Berhasil")
            data=1
        else:
            #print("login gagal")
            data=0

    return data

class LoginScreen(Screen):
    def doLogin(self):
        #print("Halooo")
        if cekLogin(self.txtUsername_.text,self.txtPassword_.text) == 1:
            print("masuk ke menu")
            self.manager.current = 'Beranda'


class HomeScreen(Screen):
    pass

class DataScreen(Screen):
    pass

class PerpusScreen(Screen):
    pass

class PetugasScreen(Screen):
    pass

class AnggotaScreen(Screen):
    def doAnggota(self):
      with urllib.request.urlopen("http://localhost/api_new.php?auth=888&perintah=insert&id_anggota="+id_anggota)as json_url:
        data = json.loads(json_url.read())

class PeminjamanScreen(Screen):
    pass

class PengembalianScreen(Screen):
    pass

class BukuScreen(Screen):
    pass

class RakScreen(Screen):
    pass

class SignupScreen(Screen):
    pass

'''
class MylayoutForm(MDBoxLayout):
    def doLogin(self):
        #print("Explicit is better than implicit.")
        #self.txtPassword_.text="halo"
        cekLogin(self.txtUsername_.text,self.txtPassword_.text) #cek isi dari txtUsername_ dan txtPassword_
'''

# penamaan class harus sama dengan file kv
# mylayout.kv
# nama class WAJIB MylayoutApp
class SimApp(MDApp):
    pass
if __name__ == '__main__':
     def build(self):
        self.theme_cls.primary_palette = "Blue"
SimApp().run()